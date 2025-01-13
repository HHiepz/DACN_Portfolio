<p align="center">
  <img alt="tranhuuhiep2004.id.vn" src="public/images/logo/2k9x.svg" width="80" />
</p>
<h1 align="center">
  tranhuuhiep2004.id.vn
</h1>

<p align="center">Website portfolio cá nhân.</p>

## Công nghệ

- [Laravel](https://laravel.com/docs/10.x/releases) cho hệ thống backend
- [Bootstrap](https://getbootstrap.com/) cho thiết kế giao diện

## Tác giả

Xin chào! Tôi là Trần Hữu Hiệp, một Backend Developer với 1 năm kinh nghiệm. Website này là nơi tôi giới thiệu về bản thân, các dự án cá nhân và những kiến thức tôi đã học hỏi. Nếu bạn thấy những gì tôi chia sẻ hữu ích, hãy kết nối với tôi qua:

- [Github (HHiepz)](https://www.github.com/hhiepz)
- [LinkedIn (Trần Hữu Hiệp)](https://www.linkedin.com/in/hhiepz/)


## Khởi chạy dự án

Hướng dẫn dưới đây sẽ giúp bạn cài đặt và khởi chạy dự án này trên máy tính của mình.

### Yêu cầu

- PHP tối thiểu phiên bản 8.2
- Database (Khuyến nghị: [MySQL](https://www.mysql.com/))
- [Composer](https://getcomposer.org/download/) phiên bản 2 trở lên

### Cài đặt

Sao chép dự án từ GitHub:
```bash
git clone https://github.com/HHiepz/DACN_Portfolio.git
```

Cài đặt các gói phụ thuộc qua Composer:
```bash
composer install
```

Thiết lập cấu hình môi trường:
```bash
cp .env.example .env
php artisan key:generate
```

Tạo database và chạy migration:
```bash
php artisan migrate
```

Khởi chạy dự án:
```bash
php artisan serve
```

Bây giờ bạn có thể truy cập dự án tại `http://localhost:8000`.
