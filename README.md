# Simple Proxy with Proxy

Mô hình Proxy đơn giản, sử dụng PHP. Hoạt động giống như SSH Turnel


#### Đề bài

1. **Client** cần Request tới **TargetServer**
2. **Client** không có quyền truy cập tới **TargetServer** nhưng có 1 **VPNServer** có thể gọi tới

#### Lời giải

1. **Client** Request tới **VPNServer**
2. **VPNServer** nhận dữ liệu từ **Client**
3. **VPNServer** thực hiện gửi request tới **TargetServer**
4. **VPNServer** nhận dữ liệu từ **TargetServer**, response dữ liệu đó về cho **Client** theo đúng quy chuẩn giữa **Client** và **TargetServer**

#### Simple Source

```php
<?php
include __DIR__ . '/helpers.php';

// Main Endpoint
$targetServer = 'http://google.com/';

// Received Data from Client
$username  = getPost('username');
$inputData = array(
    'username' => $username,
);

// Forward Client Data to Target Server
$response = sendRequest($targetServer, $inputData);

// Received Response from targetServer and response to Client
if ($response === FALSE) {
    $data     = array('resultCode' => 0, 'desc' => 'Error');
    $response = json_encode($data);
}
// Output
header('Content-Type: application/json');
echo $response;

```
### Liên hệ

| STT  | Họ tên         | SĐT           | Email           | Skype            |
| ---- | -------------- | ------------- | --------------- | ---------------- |
| 1    | Nguyễn An Hưng | 033 295 3760 | hungna@gviet.vn | nguyenanhung5891 |

