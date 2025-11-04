# PowerShell script to backup file creation and last modified dates
# This script scans all files in the current directory and subdirectories
# and saves their CreationTime and LastWriteTime to a JSON file

param(
    [string]$OutputFile = "file-dates-backup.json"
)

Write-Host "Starting file dates backup..." -ForegroundColor Green
Write-Host "Scanning files in: $PWD" -ForegroundColor Yellow

# Get all files recursively, excluding the backup JSON file itself
$files = Get-ChildItem -Path . -File -Recurse | Where-Object { 
    $_.FullName -notlike "*$OutputFile" 
}

$fileCount = $files.Count
Write-Host "Found $fileCount files to backup" -ForegroundColor Cyan

# Create array to store file information
$fileData = @()

$processed = 0
foreach ($file in $files) {
    $processed++
    $relativePath = $file.FullName.Replace($PWD.Path, "").TrimStart('\', '/')
    
    # Get file dates
    $fileInfo = [PSCustomObject]@{
        Path = $relativePath
        CreationTime = $file.CreationTime.ToString("yyyy-MM-dd HH:mm:ss.fff")
        LastWriteTime = $file.LastWriteTime.ToString("yyyy-MM-dd HH:mm:ss.fff")
    }
    
    $fileData += $fileInfo
    
    # Progress indicator
    if ($processed % 100 -eq 0) {
        Write-Progress -Activity "Backing up file dates" -Status "Processing file $processed of $fileCount" -PercentComplete (($processed / $fileCount) * 100)
    }
}

Write-Progress -Activity "Backing up file dates" -Completed

# Create backup object with metadata
$backup = [PSCustomObject]@{
    BackupDate = (Get-Date).ToString("yyyy-MM-dd HH:mm:ss")
    BackupPath = $PWD.Path
    FileCount = $fileData.Count
    Files = $fileData
}

# Convert to JSON and save
$json = $backup | ConvertTo-Json -Depth 10
$outputPath = Join-Path $PWD $OutputFile
$json | Out-File -FilePath $outputPath -Encoding UTF8

Write-Host "`nBackup completed successfully!" -ForegroundColor Green
Write-Host "Backup file: $outputPath" -ForegroundColor Cyan
Write-Host "Files backed up: $($fileData.Count)" -ForegroundColor Cyan
Write-Host "`nYou can now use restore-file-dates.ps1 to restore these dates." -ForegroundColor Yellow

