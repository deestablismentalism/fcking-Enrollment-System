# Server-Side Structure

This directory contains the server-side PHP files organized by user role and functionality.

## Directory Structure

- **core/** - Core functionality files (database connection, encryption, etc.)
- **common/** - Common functionality used across different user types
- **admin/** - Admin-specific functionality
- **users/** - Regular user functionality
- **teachers/** - Teacher-specific functionality
- **students/** - Student-related functionality

## Reorganization Process

The files in this directory have been categorized based on their function and the user type they serve. To complete the reorganization:

1. The subdirectories have been created
2. Use one of the reorganization scripts to copy files to their new locations:
   - For Windows Command Prompt: Run `reorganize_files.bat`
   - For Windows PowerShell: Run `reorganize_files.ps1`
3. After verifying everything works correctly, you may delete the original files from the root server_side directory

## File Categorization

See `file_categorization.txt` for a detailed list of files and their categorization.

## Important Notes

- Some files may be duplicated in different categories if they serve multiple user types
- After moving files, you may need to update include paths in PHP files
- Test thoroughly after reorganization to ensure everything works correctly 