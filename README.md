# Laravel HUCE - Quản lý sinh viên và lớp học

Project Laravel 12 thực hành CRUD cho hai nhóm dữ liệu:

- Sinh viên: danh sách, xem, thêm, sửa và xóa.
- Lớp học: danh sách, thêm, sửa và xóa.

## Yêu cầu

- PHP 8.2 trở lên.
- Composer.
- XAMPP với Apache và MySQL/MariaDB.

## Cài đặt

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
```

Mở phpMyAdmin tại `http://localhost/phpmyadmin` và tạo database:

```text
Tên: 68pm34
Collation: utf8mb4_unicode_ci
```

Cấu hình database trong `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=68pm34
DB_USERNAME=root
DB_PASSWORD=
```

Tạo bảng và dữ liệu mẫu:

```powershell
php artisan config:clear
php artisan migrate --seed
```

Seeder tạo 15 sinh viên, 10 lớp học và một user mẫu.

## Chạy project

```powershell
php artisan serve
```

Các trang chính:

- `http://127.0.0.1:8000/sinhvien`
- `http://127.0.0.1:8000/lophoc`

## Kiểm thử

```powershell
php artisan test
```

Nếu muốn tạo lại toàn bộ database, lưu ý lệnh sau sẽ xóa dữ liệu hiện có:

```powershell
php artisan migrate:fresh --seed
```
