<?php
// Connect
//* mysqli_connect(): Tạo kết nối với database MySQL
$conn = mysqli_connect("localhost", "root", "", "mydb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//* mysqli_select_db(): Chọn database để sử dụng
$db = "mydb";
mysqli_select_db($conn, $db);

// Query
//* mysqli_query(): Thực hiện một truy vấn SQL
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

//* mysqli_multi_query(): Thực hiện nhiều truy vấn SQL cùng một lúc
$sql = "UPDATE users SET name = 'John Doe' WHERE id = 1;";
$sql .= "UPDATE users SET age = 30 WHERE id = 2;";

if (mysqli_multi_query($conn, $sql)) {
    do {
        // Xử lý kết quả truy vấn đầu tiên
        if ($result = mysqli_store_result($conn)) {
            while ($row = mysqli_fetch_row($result)) {
                printf("%s\n", $row[0]);
            }
            mysqli_free_result($result);
        }
        // Kiểm tra xem có truy vấn tiếp theo không
    } while (mysqli_next_result($conn));

    if (mysqli_errno($conn)) {
        printf("SQL error: %s\n", mysqli_error($conn));
    }
} else {
    printf("SQL error: %s\n", mysqli_error($conn));
}

mysqli_close($conn);

// Fetch
//* mysqli_fetch_assoc(): Trả về một hàng kết quả dưới dạng mảng kết hợp (key - value)
$row = mysqli_fetch_assoc($result);

//* mysqli_fetch_array(): Trả về một hàng kết quả dưới dạng mảng, có thể là mảng số hoặc mảng kết hợp
$row = mysqli_fetch_array($result);

//* mysqli_fetch_row(): Trả về một hàng kết quả dưới dạng mảng số (index - value)
$row = mysqli_fetch_row($result);

//* mysqli_fetch_all(): Trả về tất cả kết quả truy vấn dưới dạng mảng
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

//* mysqli_num_rows(): Trả về số hàng kết quả
$count = mysqli_num_rows($result);

//* mysqli_field_count(): Trả về số cột trong kết quả truy vấn
$columns = mysqli_field_count($conn);

// Exec
//* mysqli_insert_id(): Trả về ID của bản ghi vừa được thêm mới
$id = mysqli_insert_id($conn);

//* mysqli_affected_rows(): Trả về số bản ghi đã bị ảnh hưởng bởi truy vấn
$count = mysqli_affected_rows($conn);

// Security
//* mysqli_real_escape_string(): Lọc ký tự đặc biệt trong dữ liệu để tránh SQL injection
$name = mysqli_real_escape_string($conn, $_POST['name']);

// Manage
//* mysqli_free_result(): giải phóng bộ nhớ được sử dụng
mysqli_free_result($result);

//* mysqli_begin_transaction(): Bắt đầu một giao dịch
mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);

//* mysqli_commit(): Hoàn tất một giao dịch
mysqli_commit($conn);

//* mysqli_rollback(): Hủy bỏ một giao dịch
mysqli_rollback($conn);

//* mysqli_close(): Đóng kết nối với database
mysqli_close($conn);

//* mysqli_ping(): Kiểm tra xem kết nối với database vẫn còn hoạt động
mysqli_ping($conn);

