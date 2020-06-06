# ie213_k21_nhom7_mxh
Đồ án nhóm 7 - Mạng xã hội

Các bước khởi tạo project:
1. Database
- Login vào trang phpMyAmin ở localhost, nhớ chọn loại database là MySQL.
- Tạo database tên 'mxh' hoặc gì thì tùy các bạn, nhưng phải nhớ config cho đúng ở bước phía dưới.
- Vào thư mục /sql , tìm sql tên init_db.sql sau đó import vào database vừa tạo ở trên
- Vào thư mục /config/database.php , kiểm tra lại config kết nối vào database vừa tạo:
    + Port 3308 (trong trường hợp wamp chỉ có MySQL và Không có MariaDB, thì chọn port 3306)
    + tên database phải giống tên vừa chọn ở trên
    + hostname là localhost
    + username/password tùy vào username và password các bạn sử dụng khi đăng nhập phpMyAdmin

2. Cấu trúc chung của project

+ Controllers
|   + Login (đăng nhập, đăng ký, đăng xuất)
|   + Homepage (Nếu chưa đăng nhập sẽ bị đẩy sang trang đăng nhập)
|   + etc etc controller
+ Models
|   + Login_model (Thường ta sẽ tạo riêng 1 model cho từng đối tượng trong project như User, admin, Bài viết, etc... để tránh tình trạng code đụng nhau và dễ quản lý)
|   + etc etc model
+ Views
|   + Parts (thư mục chứa những thành phần chung của một trang view ví dụ Header, Footer)
|   + Login (thư mục chứa layout riêng của trang Login)
|   + Hompage (thư mục chứa layout riêng của trang Homepage)
|   + etc etc view
+ sql (thư mục chứa các câu lệnh SQL mỗi khi có sự thay đổi về cấu trúc bảng, tạo thêm bảng, cột, etc...)
+ assets (thư mục chứa các code CSS, JS dùng để load vào các trang, thường đoạn code load các file này sẽ đặt trong Header)
+ system (DO NOT TOUCH! hàng nóng đừng có đụng vào)
+ gitignore (khai báo các thư mục sẽ được Loại ra khi push lên github, chủ yếu nó sẽ ngăn không cho push nhầm các file không cần thiết như /system)
+ etc etc (các file và thư mục còn lại các bạn đừng thay đổi gì, giữ nguyên mà xài)