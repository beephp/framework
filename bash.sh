#!/bin/bash

# مسیر فعلی
base_dir=$(pwd)

# همه فایل‌ها را به صورت بازگشتی پیدا کن
find "$base_dir" -type f | while read -r file; do
    echo "=============================="
    echo "📄 File: $file"
    echo "------------------------------"
    cat "$file"
    echo -e "\n==============================\n"
done
