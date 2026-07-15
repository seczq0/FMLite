<?php
// FMLite File Manager, Simple, clean file manager.
$password = 'your_password'; // CHANGE THIS PASSWORD

session_start();
if (isset($_GET['logout'])) { unset($_SESSION['logged']); header('Location: ?'); exit; }
if (isset($_POST['pass'])) { if ($_POST['pass'] === $password) { $_SESSION['logged'] = true; } else { $err = "Invalid Password"; } }

//Check login
if (!isset($_SESSION['logged'])) {
    die('<!DOCTYPE html>
    <html>
    <head>
        <title>FMLite File Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                background-color: #f3f4f6;
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
                margin: 0;
                padding: 20px;
                box-sizing: border-box;
            }
            .login-card {
                background: #ffffff;
                width: 100%;
                max-width: 380px;
                text-align: center;
                border-radius: 16px;
                box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
                padding: 40px 30px;
                box-sizing: border-box;
                border: 1px solid #e5e7eb;
            }
            .icon-wrapper {
                margin-bottom: 20px;
            }
            .title {
                margin: 0 0 8px 0;
                color: #111827;
                font-weight: 700;
                font-size: 24px;
                letter-spacing: -0.5px;
            }
            .subtitle {
                color: #6b7280;
                font-size: 14px;
                margin: 0 0 28px 0;
                line-height: 1.5;
            }
            .input-field {
                width: 100%;
                padding: 12px 16px;
                margin-bottom: 16px;
                border: 1px solid #d1d5db;
                border-radius: 8px;
                font-size: 15px;
                transition: all 0.15s ease-in-out;
                outline: none;
                box-sizing: border-box;
            }
            .input-field:focus {
                border-color: #2563eb;
                box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
            }
            .submit-btn {
                width: 100%;
                padding: 12px;
                background-color: #2563eb;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: background-color 0.15s ease-in-out;
            }
            .submit-btn:hover {
                background-color: #1d4ed8;
            }
            .error-banner {
                background-color: #fef2f2;
                color: #b91c1c;
                border: 1px solid #fee2e2;
                font-size: 14px;
                padding: 10px;
                border-radius: 8px;
                margin-bottom: 16px;
                font-weight: 500;
            }
        </style>
    </head>
    <body>
        <div class="login-card">
            <div class="icon-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="64" height="64">
                    <defs>
                        <linearGradient id="drawerMetal" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#495057; stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#212529; stop-opacity:1" />
                        </linearGradient>
                        <linearGradient id="addGreen" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#2ecc71; stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#27ae60; stop-opacity:1" />
                        </linearGradient>
                        <linearGradient id="editBlue" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#3498db; stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#2980b9; stop-opacity:1" />
                        </linearGradient>
                        <linearGradient id="deleteRed" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#e74c3c; stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#c0392b; stop-opacity:1" />
                        </linearGradient>
                    </defs>
                    <path d="M4,10 h4.5 l1,1 h5 a1,1 0 0,1 1,1 v6 h-11.5 z" fill="url(#addGreen)" opacity="0.8" />
                    <path d="M8,13.5 h2 M9,12.5 v2" stroke="#ffffff" stroke-width="1.2" stroke-linecap="round" />
                    <path d="M11,6 h8 a1,1 0 0,1 1,1 v11 h-10 z" fill="#ffffff" stroke="#3498db" stroke-width="1" />
                    <path d="M13,10 h4 M13,12 h4 M13,14 h2" stroke="#bdc3c7" stroke-width="0.8" />
                    <path d="M19,5.5 l1,1 l-3,3 l-1,-1 z" fill="url(#editBlue)" />
                    <path d="M16,11 h4.5 l1,1 h5 a1,1 0 0,1 1,1 v5 h-11.5 z" fill="url(#deleteRed)" opacity="0.85" />
                    <path d="M22,14.5 l2,2 M24,14.5 l-2,2" stroke="#ffffff" stroke-width="1.2" stroke-linecap="round" />
                    <rect x="2" y="15" width="28" height="14" rx="2" fill="#1e2125" />
                    <path d="M1,17 h30 v10 a2,2 0 0,1 -2,2 h-26 a2,2 0 0,1 -2,-2 z" fill="url(#drawerMetal)" />
                    <rect x="11" y="21" width="10" height="2" rx="1" fill="#dee2e6" />
                    <rect x="12" y="18.5" width="8" height="1.5" rx="0.3" fill="#ffffff" opacity="0.9" />
                    <line x1="13" y1="19.25" x2="19" y2="19.25" stroke="#7f8c8d" stroke-width="0.5" />
                </svg>
            </div>
            <h3 class="title">FMLite File Manager</h3>
            <p class="subtitle">Welcome! Please enter your password to access your secure files.</p>
            
            <form method="post">
                '.(isset($err)?'<div class="error-banner">'.$err.'</div>':'').'
                <input type="password" name="pass" class="input-field" placeholder="Enter Password" required autofocus>
                <input type="submit" class="submit-btn" value="Sign In">
            </form>
        </div>
    </body>
    </html>');
}

$dir = isset($_GET['d']) ? realpath($_GET['d']) : getcwd();
if (!$dir || strpos($dir, $_SERVER['DOCUMENT_ROOT']) === false) { $dir = $_SERVER['DOCUMENT_ROOT']; }

// --- AJAX API ENDPOINTS ---
if (isset($_GET['api'])) {
    header('Content-Type: application/json');
    
    // Handle File Upload
    if ($_GET['api'] === 'upload') {
        if (isset($_FILES['file'])) {
            $dest = $dir . '/' . basename($_FILES['file']['name']);
            if (move_uploaded_file($_FILES['file']['tmp_name'], $dest)) {
                echo json_encode(['status' => 'success', 'message' => 'File uploaded successfully!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Upload failed. Check directory permissions.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No file provided.']);
        }
        exit;
    }

    // Handle Creating New File
    if ($_GET['api'] === 'create_file') {
        $clean_name = trim(basename($_POST['new_file_name'] ?? ''));
        if (empty($clean_name)) {
            echo json_encode(['status' => 'error', 'message' => 'Filename cannot be empty.']);
            exit;
        }
        $target_file = $dir . '/' . $clean_name;
        if (file_exists($target_file)) {
            echo json_encode(['status' => 'error', 'message' => 'File or folder already exists.']);
        } elseif (touch($target_file)) {
            echo json_encode(['status' => 'success', 'message' => 'File created successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Could not create file. Permission denied.']);
        }
        exit;
    }

    // Handle Creating New Folder
    if ($_GET['api'] === 'create_folder') {
        $clean_name = trim(basename($_POST['new_folder_name'] ?? ''));
        if (empty($clean_name)) {
            echo json_encode(['status' => 'error', 'message' => 'Folder name cannot be empty.']);
            exit;
        }
        $target_folder = $dir . '/' . $clean_name;
        if (file_exists($target_folder)) {
            echo json_encode(['status' => 'error', 'message' => 'Folder or file already exists.']);
        } elseif (mkdir($target_folder, 0755)) {
            echo json_encode(['status' => 'success', 'message' => 'Folder created successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Could not create folder. Permission denied.']);
        }
        exit;
    }

    // Handle Delete Operation
    if ($_GET['api'] === 'delete') {
        $target_del = realpath($_POST['target'] ?? '');
        if ($target_del && strpos($target_del, $_SERVER['DOCUMENT_ROOT']) !== false) {
            if (is_file($target_del)) {
                if (unlink($target_del)) {
                    echo json_encode(['status' => 'success', 'message' => 'File deleted successfully.']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to delete file.']);
                }
            } elseif (is_dir($target_del)) {
                if (@rmdir($target_del)) {
                    echo json_encode(['status' => 'success', 'message' => 'Folder deleted successfully.']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Folder must be empty to delete it.']);
                }
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid file path or access denied.']);
        }
        exit;
    }

    // Handle File Saving (Edit Mode)
    if ($_GET['api'] === 'save_file') {
        $target_file = realpath($_POST['file_path'] ?? '');
        if ($target_file && strpos($target_file, $_SERVER['DOCUMENT_ROOT']) !== false && is_file($target_file)) {
            if (file_put_contents($target_file, $_POST['content'] ?? '') !== false) {
                echo json_encode(['status' => 'success', 'message' => 'File saved successfully!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Unable to write to file. check write permissions.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid file path.']);
        }
        exit;
    }
}

// Is Edit View requested?
$editing = false;
if (isset($_GET['edit'])) {
    $edit_file = realpath($_GET['edit']);
    if ($edit_file && strpos($edit_file, $_SERVER['DOCUMENT_ROOT']) !== false && is_file($edit_file)) {
        $editing = true;
        $file_content = file_get_contents($edit_file);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>FMLite File manager</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMiAzMiI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJkcmF3ZXJNZXRhbCIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+PHN0b3Agb2Zmc2V0PSIwJSIgc3R5bGU9InN0b3AtY29sb3I6IzQ5NTA1Nzsgc3RvcC1vcGFjaXR5OjEiIC8+PHN0b3Agb2Zmc2V0PSIxMDAlIiBzdHlsZT0ic3RvcC1jb2xvcjojMjEyNTI5OyBzdG9wLW9wYWNpdHk6MSIgLz48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0iYWRkR3JlZW4iIHgxPSIwJSIgeTE9IjAlIiB4Mj0iMTAwJSIgeTI9IjEwMCUiPjxzdG9wIG9mZnNldD0iMCUiIHN0eWxlPSJzdG9wLWNvbG9yOiMyZWNjNzE7IHN0b3Atb3BhY2l0eToxIiAvPjxzdG9wIG9mZnNldD0i1MDAlIiBzdHlsZT0ic3RvcC1jb2xvcjojMjdhZTYwOyBzdG9wLW9wYWNpdHk6MSIgLz48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0iZWRpdEJsdWUiIHgxPSIwJSIgeTE9IjAlIiB4Mj0iMTAwJSIgeTI9IjEwMCUiPjxzdG9wIG9mZnNldD0iMCUiIHN0eWxlPSJzdG9wLWNvbG9yOiMzNDk4ZGI7IHN0b3Atb3BhY2l0eToxIiAvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3R5bGU9InN0b3AtY29sb3I6IzI5ODBiOTsgc3RvcC1vcGFjaXR5OjEiIC8+PC9saW5lYXJHcmFkaWVudD48bGluZWFyR3JhZGllbnQgaWQ9ImRlbGV0ZVJlZCIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+PHN0b3Agb2Zmc2V0PSIwJSIgc3R5bGU9InN0b3AtY29sb3I6I2U3NGMzYzsgc3RvcC1vcGFjaXR5OjEiIC8+PHN0b3Agb2Zmc2V0PSIxMDAlIiBzdHlsZT0ic3RvcC1jb2xvcjojYzAzOWFiOyBzdG9wLW9wYWNpdHk6MSIgLz48L2xpbmVhckdyYWRpZW50PjwvZGVmcz48cGF0aCBdPSJNNCwxMCBoNC41IGwxLDEgaDUgYTEsMSAwIDAgLDEgMSwxIHY2IGgtMTEuNSB6IiBmaWxsPSJ1cmwoI2FkZEdyZWVuKSIgb3BhY2l0eT0iMC44IiAvPjxwYXRoIGQ9Ik04LDEzLjUgaDIgTTksMTIuNSB2MiIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2Utd2lkdGg9IjEuMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiAvPjxwYXRoIGQ9Ik0xMSw2IGg4IGExLDEgMCAwLDEgMSwxIHYxMSBoLTEwIHoiIGZpbGw9IiNmZmZmZmYiIHN0cm9rZT0iIzM0OThkYiIgc3Ryb2tlLXdpZHRoPSIxIiAvPjxwYXRoIGQ9Ik0xMywxMCBoNCBNMTMsMTIgaDQgTTEzLDE0IGgyIiBzdHJva2U9IiNiZGMzYzciIHN0cm9rZS13aWR0aD0iMC44IiAvPjxwYXRoIGQ9Ik0xOSw1LjUgbDEsMSBsLTMsMyBsLTEsLTEgeiIgZmlsbD0idXJsKCNlZGl0Qmx1ZSkiIC8+PHBhdGggZD0iTTE2LDExIGg0LjUgbDEsMSBoNSBhMSwxIDAgMCAwLDEgMSwxIHY1IGgtMTEuNSB6IiBmaWxsPSJ1cmwoI2RlbGV0ZVJlZCkiIG9wYWNpdHk9IjAuODUiIC8+PHBhdGggZD0iTTIyLDE0LjUgbDIsMiBNMjQsMTQuNSBsLTIsMiIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2Utd2lkdGg9IjEuMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiAvPjxyZWN0IHg9IjIiIHk9IjE1IiB3aWR0aD0iMjgiIGhlaWdodD0iMTQiIHJ4PSIyIiBmaWxsPSIjMWUyMTI1IiAvPjxwYXRoIGQ9Ik0xLDE3IGgzMCB2MTAgYTEsMSAwIDAgLDEgLTIsMiBoLTI2IGExLDEgMCAwLDEgLTIsLTIgeiIgZmlsbD0idXJsKCNkcmF3ZXJNZXRhbCkiIC8+PHJlY3QgeD0iMTEiIHk9IjIxIiB3aWR0aD0iMTAiIGhlaWdodD0iMiIgcng9IjEiIGZpbGw9IiNkZWUyZTYiIC8+PHJlY3QgeD0iMTIiIHk9IjE4LjUiIHdpZHRoPSI4IiBoZWlnaHQ9IjEuNSIgcng9IjAuMyIgZmlsbD0iI2ZmZmZmZiIgb3BhY2l0eT0iMC55IiAvPjxsaW5lIHgxPSIxMyIgeTE9IjE5LjI1IiB4Mj0iMTkiIHkyPSIxOS4yNSIgc3Ryb2tlPSIjN2Y4Yzg5IiBzdHJva2Utd2lkdGg9IjAuNSIgLz48L3N2Zz4=">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/theme/monokai.min.css">
    
    <style>
        .editor-container {
            border-radius: 6px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            overflow: hidden;
            border: 1px solid #3c3c3c;
            background-color: #272822;
        }
        .editor-header {
            background-color: #1e1e1a;
            border-bottom: 1px solid #3c3c3c;
            padding: 10px 15px;
            color: #f8f8f2;
        }
        .CodeMirror {
            height: 500px;
            font-family: 'Consolas', 'Fira Code', 'Courier New', monospace;
            font-size: 14px;
        }
        .editor-footer {
            background-color: #75715e;
            color: #ffffff;
            font-size: 12px;
            padding: 4px 15px;
        }
        .btn-editor-save {
            background-color: #a6e22e;
            border-color: #a6e22e;
            color: #272822;
            font-weight: bold;
        }
        .btn-editor-save:hover {
            background-color: #8ec720;
            border-color: #8ec720;
            color: #272822;
        }
        .control-panel {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 15px;
        }
        #statusMessage {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            animation: slideIn 0.3s ease-out;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    </style>
</head>
<body class="container py-4">

    <div id="statusMessage" class="alert alert-dismissible fade show" role="alert">
        <span id="statusText"></span>
        <button type="button" class="btn-close" onclick="hideMessage()"></button>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="46" height="46" class="me-3">
                <defs>
                    <linearGradient id="drawerMetal" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#495057; stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#212529; stop-opacity:1" />
                    </linearGradient>
                    <linearGradient id="addGreen" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#2ecc71; stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#27ae60; stop-opacity:1" />
                    </linearGradient>
                    <linearGradient id="editBlue" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#3498db; stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#2980b9; stop-opacity:1" />
                    </linearGradient>
                    <linearGradient id="deleteRed" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#e74c3c; stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#c0392b; stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path d="M4,10 h4.5 l1,1 h5 a1,1 0 0,1 1,1 v6 h-11.5 z" fill="url(#addGreen)" opacity="0.8" />
                <path d="M8,13.5 h2 M9,12.5 v2" stroke="#ffffff" stroke-width="1.2" stroke-linecap="round" />
                <path d="M11,6 h8 a1,1 0 0,1 1,1 v11 h-10 z" fill="#ffffff" stroke="#3498db" stroke-width="1" />
                <path d="M13,10 h4 M13,12 h4 M13,14 h2" stroke="#bdc3c7" stroke-width="0.8" />
                <path d="M19,5.5 l1,1 l-3,3 l-1,-1 z" fill="url(#editBlue)" />
                <path d="M16,11 h4.5 l1,1 h5 a1,1 0 0,1 1,1 v5 h-11.5 z" fill="url(#deleteRed)" opacity="0.85" />
                <path d="M22,14.5 l2,2 M24,14.5 l-2,2" stroke="#ffffff" stroke-width="1.2" stroke-linecap="round" />
                <rect x="2" y="15" width="28" height="14" rx="2" fill="#1e2125" />
                <path d="M1,17 h30 v10 a2,2 0 0,1 -2,2 h-26 a2,2 0 0,1 -2,-2 z" fill="url(#drawerMetal)" />
                <rect x="11" y="21" width="10" height="2" rx="1" fill="#dee2e6" />
                <rect x="12" y="18.5" width="8" height="1.5" rx="0.3" fill="#ffffff" opacity="0.9" />
                <line x1="13" y1="19.25" x2="19" y2="19.25" stroke="#7f8c8d" stroke-width="0.5" />
            </svg>
            <div>
                <h4 class="mb-0 fw-bold text-dark" style="font-family: 'Segoe UI', system-ui, sans-serif; letter-spacing: -0.5px;">FMLite File Manager</h4>
                <small class="text-muted">Directory: <?php echo htmlspecialchars($dir); ?></small>
            </div>
        </div>
        <a href="?logout=1" class="btn btn-sm btn-outline-danger px-3 rounded-pill">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
        </a>
    </div>

    <?php if ($editing): ?>
        <div class="editor-container">
            <form id="editorForm" onsubmit="submitForm(event, '?api=save_file', this)">
                <input type="hidden" name="file_path" value="<?php echo htmlspecialchars($edit_file); ?>">
                
                <div class="editor-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold">🛠️ Editing: <?php echo htmlspecialchars(basename($edit_file)); ?></span>
                    <div class="d-flex gap-2">
                        <a href="?d=<?php echo urlencode(dirname($edit_file)); ?>" class="btn btn-sm btn-outline-light">
                            <i class="bi bi-arrow-left-short"></i> Back to list
                        </a>
                        <button type="submit" class="btn btn-sm btn-editor-save">
                            <i class="bi bi-floppy me-1"></i> Save Changes
                        </button>
                    </div>
                </div>

                <textarea id="codeEditor" name="content" style="display:none;"><?php echo htmlspecialchars($file_content); ?></textarea>
                
                <div class="editor-footer d-flex justify-content-between">
                    <span>Syntax Coloring Mode Active</span>
                    <span>Path: <?php echo htmlspecialchars($edit_file); ?></span>
                </div>
            </form>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/xml/xml.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/javascript/javascript.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/css/css.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/htmlmixed/htmlmixed.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/clike/clike.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/php/php.min.js"></script>

        <script>
            var fileExtension = "<?php echo strtolower(pathinfo($edit_file, PATHINFO_EXTENSION)); ?>";
            var editorMode = "htmlmixed";

            if (fileExtension === "php") { editorMode = "application/x-httpd-php"; } 
            else if (fileExtension === "js") { editorMode = "javascript"; } 
            else if (fileExtension === "css") { editorMode = "css"; } 
            else if (fileExtension === "json") { editorMode = "application/json"; }

            var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {
                lineNumbers: true,
                mode: editorMode,
                theme: "monokai",
                tabSize: 4,
                indentUnit: 4,
                indentWithTabs: true,
                lineWrapping: true
            });
        </script>

    <?php else: ?>
        <div class="control-panel mb-4">
            <div class="row align-items-end g-3">
                <div class="col-md-4">
                    <form onsubmit="submitForm(event, '?api=upload', this, true)">
                        <label class="form-label small fw-bold text-secondary">Upload a File</label>
                        <div class="d-flex gap-2">
                            <input type="file" name="file" class="form-control form-control-sm" required>
                            <button type="submit" class="btn btn-sm btn-primary d-flex align-items-center gap-1">
                                <i class="bi bi-upload"></i> Upload
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="col-md-4">
                    <form onsubmit="submitForm(event, '?api=create_file', this)">
                        <label class="form-label small fw-bold text-secondary">Create New File</label>
                        <div class="d-flex gap-2">
                            <input type="text" name="new_file_name" class="form-control form-control-sm" placeholder="index.php" required>
                            <button type="submit" class="btn btn-sm btn-success d-flex align-items-center gap-1">
                                <i class="bi bi-file-earmark-plus"></i> Create
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <form onsubmit="submitForm(event, '?api=create_folder', this)">
                        <label class="form-label small fw-bold text-secondary">Create New Folder</label>
                        <div class="d-flex gap-2">
                            <input type="text" name="new_folder_name" class="form-control form-control-sm" placeholder="assets" required>
                            <button type="submit" name="create_folder" class="btn btn-sm btn-warning text-dark d-flex align-items-center gap-1">
                                <i class="bi bi-folder-plus"></i> Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr><th>Name</th><th>Size</th><th>Type</th><th>Actions</th></tr>
            </thead>
            <tbody id="fileTableBody">
                <?php
                if ($dir !== $_SERVER['DOCUMENT_ROOT']) {
                    $up = dirname($dir);
                    // Up One Level Link with Icon
                    echo "<tr id='row-parent'><td colspan='4'><a href='?d=".urlencode($up)."' class='text-decoration-none fw-semibold'><i class='bi bi-arrow-up-short'></i> Up One Level</a></td></tr>";
                }
                $files = scandir($dir);
                $index = 0;
                foreach ($files as $file) {
                    if ($file === '.' || $file === '..') continue;
                    $path = $dir . '/' . $file;
                    $is_dir = is_dir($path);
                    $rowId = 'row-' . $index++;
                    echo "<tr id='{$rowId}'>";
                    if ($is_dir) {
                        echo "<td><span class='text-warning me-1'><i class='bi bi-folder-fill'></i></span> <a href='?d=".urlencode($path)."' class='text-decoration-none fw-semibold text-dark'>" . htmlspecialchars($file) . "/</a></td><td>-</td><td>Folder</td>";
                        // Folder Delete Button with Icon
                        echo "<td><button class='btn btn-sm btn-outline-danger py-1 px-2 d-inline-flex align-items-center gap-1' style='font-size:12px;' onclick='deleteItem(\"".addslashes($path)."\", \"{$rowId}\")'><i class='bi bi-trash3'></i> Delete</button></td>";
                    } else {
                        echo "<td><span class='text-secondary me-1'><i class='bi bi-file-earmark-text-fill'></i></span> " . htmlspecialchars($file) . "</td>";
                        echo "<td>" . round(filesize($path)/1024, 2) . " KB</td>";
                        echo "<td>File</td>";
                        // Actions with Icons
                        echo "<td>
                                <a href='?edit=".urlencode($path)."' class='btn btn-sm btn-outline-dark py-1 px-2 d-inline-flex align-items-center gap-1' style='font-size:12px;'>
                                    <i class='bi bi-pencil-square'></i> Edit
                                </a>
                                <button class='btn btn-sm btn-outline-danger py-1 px-2 d-inline-flex align-items-center gap-1' style='font-size:12px;' onclick='deleteItem(\"".addslashes($path)."\", \"{$rowId}\")'>
                                    <i class='bi bi-trash3'></i> Delete
                                </button>
                              </td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php endif; ?>

    <script>
        function showMessage(msg, isSuccess = true) {
            const box = document.getElementById('statusMessage');
            const txt = document.getElementById('statusText');
            
            box.className = `alert alert-dismissible fade show ${isSuccess ? 'alert-success' : 'alert-danger'}`;
            txt.innerText = msg;
            box.style.display = 'block';

            setTimeout(hideMessage, 4000);
        }

        function hideMessage() {
            document.getElementById('statusMessage').style.display = 'none';
        }

        function submitForm(event, url, formElement, isUpload = false) {
            event.preventDefault();
            
            if (typeof editor !== 'undefined') {
                editor.save();
            }

            let formData = new FormData(formElement);
            
            fetch(url, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    showMessage(data.message, true);
                    
                    if (!url.includes('save_file')) {
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    }
                } else {
                    showMessage(data.message, false);
                }
            })
            .catch(err => {
                showMessage("An error occurred processing this request.", false);
            });
        }

        function deleteItem(targetPath, rowId) {
            if (!confirm("Are you sure you want to delete this?")) return;

            let formData = new FormData();
            formData.append('target', targetPath);

            fetch('?api=delete', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    showMessage(data.message, true);
                    const row = document.getElementById(rowId);
                    if (row) {
                        row.style.transition = "all 0.4s ease";
                        row.style.opacity = 0;
                        setTimeout(() => row.remove(), 400);
                    }
                } else {
                    showMessage(data.message, false);
                }
            })
            .catch(err => {
                showMessage("Could not complete delete operation.", false);
            });
        }
    </script>
</body>
</html>
