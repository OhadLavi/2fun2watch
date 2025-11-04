# PowerShell script to restore file creation and last modified dates from JSON
# Works on all files in the current directory and subdirectories

param(
    [string]$InputFile = "file-dates-backup.json",
    [string]$BasePath = "."
)

# Check if input file exists
if (-not (Test-Path $InputFile)) {
    Write-Host "Error: Backup file not found: $InputFile" -ForegroundColor Red
    Write-Host ""
    Write-Host "Press any key to exit..."
    $null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
    exit 1
}

Write-Host "Loading backup file: $InputFile" -ForegroundColor Green
Write-Host ""

# Read and parse JSON
try {
    $jsonContent = Get-Content -Path $InputFile -Encoding UTF8 -Raw
    $backupData = $jsonContent | ConvertFrom-Json
} catch {
    Write-Host "Error reading or parsing JSON file: $_" -ForegroundColor Red
    Write-Host ""
    Write-Host "Press any key to exit..."
    $null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
    exit 1
}

# Get the base path from backup or use provided path
if ($backupData.BasePath) {
    $originalBasePath = $backupData.BasePath
    $restoreBasePath = Resolve-Path $BasePath
} else {
    $restoreBasePath = Resolve-Path $BasePath
    $originalBasePath = $restoreBasePath
}

Write-Host "Backup information:" -ForegroundColor Cyan
Write-Host "  Backup Date: $($backupData.BackupDate)" -ForegroundColor Cyan
Write-Host "  Original Path: $originalBasePath" -ForegroundColor Cyan
Write-Host "  Restore Path: $restoreBasePath" -ForegroundColor Cyan
Write-Host "  Total Files: $($backupData.TotalFiles)" -ForegroundColor Cyan
Write-Host ""

# Confirm before proceeding
Write-Host "This will modify file dates. Continue? (Y/N): " -ForegroundColor Yellow -NoNewline
$response = Read-Host
if ($response -ne "Y" -and $response -ne "y") {
    Write-Host "Restore cancelled." -ForegroundColor Yellow
    Write-Host ""
    Write-Host "Press any key to exit..."
    $null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
    exit 0
}

Write-Host ""
Write-Host "Restoring file dates..." -ForegroundColor Green
Write-Host ""

$restoredCount = 0
$skippedCount = 0
$errorCount = 0

foreach ($fileInfo in $backupData.Files) {
    # Construct full path
    if ($fileInfo.FullPath) {
        # Try using original full path first
        $fullPath = $fileInfo.FullPath
        if (-not (Test-Path $fullPath)) {
            # Fallback to relative path
            $fullPath = Join-Path $restoreBasePath $fileInfo.Path
        }
    } else {
        $fullPath = Join-Path $restoreBasePath $fileInfo.Path
    }
    
    # Check if file exists
    if (-not (Test-Path $fullPath)) {
        $skippedCount++
        Write-Host "Skipped (file not found): $($fileInfo.Path)" -ForegroundColor Yellow
        continue
    }
    
    try {
        $file = Get-Item -Path $fullPath -Force
        
        # Parse dates
        $creationTime = [DateTime]::Parse($fileInfo.CreationTime)
        $lastWriteTime = [DateTime]::Parse($fileInfo.LastWriteTime)
        
        # Restore dates
        $file.CreationTime = $creationTime
        $file.LastWriteTime = $lastWriteTime
        
        $restoredCount++
        
        # Progress indicator
        if ($restoredCount % 100 -eq 0) {
            Write-Host "Restored $restoredCount files..." -ForegroundColor Yellow
        }
    } catch {
        $errorCount++
        Write-Host "Error restoring: $($fileInfo.Path) - $_" -ForegroundColor Red
    }
}

Write-Host ""
Write-Host "Restore completed!" -ForegroundColor Green
Write-Host "  Files restored: $restoredCount" -ForegroundColor Green
Write-Host "  Files skipped: $skippedCount" -ForegroundColor Yellow
Write-Host "  Errors: $errorCount" -ForegroundColor $(if ($errorCount -gt 0) { "Red" } else { "Green" })
Write-Host ""

Write-Host "Press any key to exit..."
$null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")

