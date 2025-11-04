# PowerShell script to backup file creation and last modified dates to JSON
# Works on all files in the current directory and subdirectories

param(
    [string]$OutputFile = "file-dates-backup.json",
    [string]$Path = "."
)

# Get the absolute path
$Path = Resolve-Path $Path

Write-Host "Backing up file dates from: $Path" -ForegroundColor Green
Write-Host "Output file: $OutputFile" -ForegroundColor Green
Write-Host ""

# Array to store file information
$fileData = @()

# Get all files recursively
$files = Get-ChildItem -Path $Path -File -Recurse -ErrorAction SilentlyContinue

$totalFiles = $files.Count
$processedFiles = 0

foreach ($file in $files) {
    $processedFiles++
    
    # Get relative path from the base directory
    $relativePath = $file.FullName.Substring($Path.Length).TrimStart('\')
    
    # Get file dates
    $fileInfo = @{
        Path = $relativePath
        CreationTime = $file.CreationTime.ToString("yyyy-MM-dd HH:mm:ss")
        LastWriteTime = $file.LastWriteTime.ToString("yyyy-MM-dd HH:mm:ss")
        FullPath = $file.FullName
    }
    
    $fileData += $fileInfo
    
    # Progress indicator
    if ($processedFiles % 100 -eq 0) {
        Write-Host "Processed $processedFiles of $totalFiles files..." -ForegroundColor Yellow
    }
}

# Create output object
$output = @{
    BackupDate = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
    BasePath = $Path
    TotalFiles = $fileData.Count
    Files = $fileData
}

# Convert to JSON and save
$json = $output | ConvertTo-Json -Depth 10

try {
    $json | Out-File -FilePath $OutputFile -Encoding UTF8 -Force
    Write-Host ""
    Write-Host "Successfully backed up $($fileData.Count) files to: $OutputFile" -ForegroundColor Green
    Write-Host "Backup completed at: $($output.BackupDate)" -ForegroundColor Green
} catch {
    Write-Host ""
    Write-Host "Error saving backup file: $_" -ForegroundColor Red
    exit 1
}

Write-Host ""
Write-Host "Press any key to exit..."
$null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")

