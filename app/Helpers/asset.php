<?php

if (!function_exists('versioned_asset')) {
    function versioned_asset(string $path): string
    {
        // If path is external URL (http/https), return as-is
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        // Remove leading slash for public_path() check
        $relative = ltrim($path, '/');
        $publicPath = public_path($relative);

        // Check if file exists locally
        if (is_file($publicPath)) {
            $version = filemtime($publicPath);
            
            // Check if path already has query string
            $separator = '?';
            if (str_contains($path, '?')) {
                $separator = '&';
            }
            
            // Append version parameter
            return asset($relative) . $separator . 'v=' . $version;
        }

        // Fallback to regular asset() if file not found
        return asset($relative);
    }
}
