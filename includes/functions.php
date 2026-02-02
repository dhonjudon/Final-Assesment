<?php
// Common functions for Patio Management System
function sanitize($data)
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Handle image upload for menu items
function uploadImage($file)
{
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    // Allowed file types
    $allowed = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($file['type'], $allowed)) {
        return null;
    }

    // File size limit (5MB)
    if ($file['size'] > 5 * 1024 * 1024) {
        return null;
    }

    // Create filename with timestamp to avoid conflicts
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = time() . '_' . rand(1000, 9999) . '.' . $ext;
    $upload_dir = __DIR__ . '/../assets/img/';

    // Create directory if not exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $upload_path = $upload_dir . $filename;
    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
        return $filename;
    }
    return null;
}
