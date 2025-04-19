<?php
// 定义有效的用户名和密码
$validUsername = "Headed";
// 使用单引号来避免变量解析问题
$validPassword = 'jH8@qi02UJ6$V!f^BHoJg6dca6s1%y!u';

// 检查 POST 数据是否包含必要的字段
if (isset($_POST['username']) && isset($_POST['password'])) {
    // 获取用户输入的用户名和密码
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 验证用户名和密码
    if ($username === $validUsername && $password === $validPassword) {
        // 设置长期有效的 Cookie
        $expire = time() + 365 * 24 * 60 * 60; // 有效期为一年
        $cookieSet = setcookie('authenticated', 'true', $expire, '/');
        if ($cookieSet) {
            // 重定向到受保护的页面，因在 api 目录，需返回上一级
            header('Location: ../index.html');
            exit;
        } else {
            // Cookie 设置失败，重定向回登录页面并携带错误信息
            header('Location: ../login.html?error=2');
            exit;
        }
    } else {
        // 验证失败，重定向回登录页面，需返回上一级
        header('Location: ../login.html?error=1');
        exit;
    }
} else {
    // 缺少必要的 POST 数据，重定向回登录页面
    header('Location: ../login.html?error=3');
    exit;
}
?>
