# PowerShell script to restore file creation and last modified dates
# This script reads a JSON backup file and restores the dates to all files

param(
    [string]$BackupFile = "file-dates-backup.json",
    [switch]$WhatIf
)

Write-Host "Starting file dates restoration..." -ForegroundColor Green

# Check if backup file exists
$backupPath = Join-Path $PWD $BackupFile
if (-not (Test-Path $backupPath)) {
    Write-Host "Error: Backup file not found: $backupPath" -ForegroundColor Red
    Write-Host "Please make sure the backup file exists in the current directory." -ForegroundColor Yellow
    exit 1
}

Write-Host "Loading backup file: $backupPath" -ForegroundColor Yellow

# Read and parse JSON
try {
    $jsonContent = Get-Content -Path $backupPath -Raw -Encoding UTF8
    $backup = $jsonContent | ConvertFrom-Json
}
catch {
    Write-Host "Error: Failed to parse backup file. $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}

Write-Host "Backup created on: $($backup.BackupDate)" -ForegroundColor Cyan
Write-Host "Original path: $($backup.BackupPath)" -ForegroundColor Cyan
Write-Host "Files to restore: $($backup.Files.Count)" -ForegroundColor Cyan

if ($WhatIf) {
    Write-Host "`nWHAT IF MODE - No changes will be made" -ForegroundColor Yellow
}

# Confirm restoration
if (-not $WhatIf) {
    $confirm = Read-Host "`nDo you want to restore dates for $($backup.Files.Count) files? (Y/N)"
    if ($confirm -ne 'Y' -and $confirm -ne 'y') {
        Write-Host "Restoration cancelled." -ForegroundColor Yellow
        exit 0
    }
}

Write-Host "`nRestoring file dates..." -ForegroundColor Green

$successCount = 0
$errorCount = 0
$notFoundCount = 0
$errors = @()

$processed = 0
foreach ($fileInfo in $backup.Files) {
    $processed++
    $filePath = Join-Path $PWD $fileInfo.Path
    
    # Progress indicator
    if ($processed % 100 -eq 0) {
        Write-Progress -Activity "Restoring file dates" -Status "Processing file $processed of $($backup.Files.Count)" -PercentComplete (($processed / $backup.Files.Count) * 100)
    }
    
    # Check if file exists
    if (-not (Test-Path $filePath)) {
        $notFoundCount++
        $errors += "File not found: $($fileInfo.Path)"
        continue
    }
    
    try {
        # Parse dates
        $creationTime = [DateTime]::Parse($fileInfo.CreationTime)
        $lastWriteTime = [DateTime]::Parse($fileInfo.LastWriteTime)
        
        if (-not $WhatIf) {
            # Restore dates
            $file = Get-Item -Path $filePath
            $file.CreationTime = $creationTime
            $file.LastWriteTime = $lastWriteTime
        }
        
        $successCount++
    }
    catch {
        $errorCount++
        $errorMsg = "Error restoring $($fileInfo.Path): $($_.Exception.Message)"
        $errors += $errorMsg
        Write-Host $errorMsg -ForegroundColor Red
    }
}

Write-Progress -Activity "Restoring file dates" -Completed

# Summary
Write-Host "`n" -NoNewline
Write-Host "=" * 60 -ForegroundColor Cyan
Write-Host "Restoration Summary" -ForegroundColor Green
Write-Host "=" * 60 -ForegroundColor Cyan
Write-Host "Successfully restored: $successCount files" -ForegroundColor Green
if ($notFoundCount -gt 0) {
    Write-Host "Files not found: $notFoundCount" -ForegroundColor Yellow
}
if ($errorCount -gt 0) {
    Write-Host "Errors: $errorCount" -ForegroundColor Red
}

if ($errors.Count -gt 0 -and $errorCount -le 20) {
    Write-Host "`nErrors:" -ForegroundColor Red
    foreach ($error in $errors) {
        Write-Host "  - $error" -ForegroundColor Red
    }
}
elseif ($errors.Count -gt 20) {
    Write-Host "`nToo many errors to display. Check the log above." -ForegroundColor Yellow
}

if ($WhatIf) {
    Write-Host "`nThis was a dry run. No changes were made." -ForegroundColor Yellow
    Write-Host "Run without -WhatIf to actually restore the dates." -ForegroundColor Yellow
}
else {
    Write-Host "`nRestoration completed!" -ForegroundColor Green
}

