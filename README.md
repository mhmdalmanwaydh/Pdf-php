# 📄➡️🖼️ PDF to Images Converter (PHP)

This project provides a simple PHP class that converts **PDF pages into PNG images** using the `pdftoppm` command-line tool (from the Poppler utilities).
It automatically validates paths, ensures output directories exist, and returns a list of generated PNG files.

---

## 🚀 Features

* Convert any PDF file into one PNG image per page
* Automatically creates output directory if missing
* Uses `pdftoppm` for reliable, high-quality image generation
* Returns an array of generated image file paths
* Simple and easy to integrate into any PHP project

---

## 📦 Requirements

### 1. **PHP 7.4+ or 8.x**

### 2. **Poppler Utils installed**

You must have `pdftoppm` available on your system.

#### Install on Linux (Ubuntu/Debian):

```bash
sudo apt install poppler-utils
```

#### Install on macOS (Homebrew):

```bash
brew install poppler
```

---

## 📂 Folder Structure Example

```
project/
│
├── src/
│   └── PdfToImages.php
│
├── input/sample.pdf
│
└── output/
```

---

## 🧠 How It Works

The class simply calls the Poppler tool:

```
pdftoppm -png input.pdf output/page
```

This creates files such as:

```
page-1.png
page-2.png
page-3.png
```

---

## 🧩 Usage Example

```php
require 'src/PdfToImages.php';

use PdfToImages\PdfToImages;

$pdfPath = "input/sample.pdf";
$outputDir = "output/pages";

try {
    $converter = new PdfToImages($pdfPath, $outputDir);
    $images = $converter->convert();

    echo "Generated images:\n";
    print_r($images);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

---

## 🗂️ Returned Output Example

```php
Array
(
    [0] => output/pages/page-1.png
    [1] => output/pages/page-2.png
    [2] => output/pages/page-3.png
)
```

---

## 🧱 Class Overview

### **Constructor**

```php
new PdfToImages($pdfPath, $outputDir);
```

### **convert()**

* Checks that the PDF file exists
* Creates output directory if missing
* Executes `pdftoppm -png`
* Returns an array of PNG image paths

---

## ⚠️ Error Handling

The class throws exceptions for:

* Missing PDF file
* `pdftoppm` failure
* Unable to create output directory

Example:

```
PDF file not found: path/to/file.pdf
Failed to convert PDF to images.
```
