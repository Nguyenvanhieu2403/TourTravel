$(document).ready(function () {
    // Xác định trang hiện tại để áp dụng lớp 'active'
    var currentUrl = window.location.pathname.split("/").pop();
    
    // Loại bỏ lớp 'active' từ tất cả các nav-link
    $(".navbar-nav .nav-link").removeClass("active");

    // Thêm lớp 'active' cho nav-link tương ứng với URL hiện tại
    $(".navbar-nav .nav-link[href='" + currentUrl + "']").addClass("active");

    console.log(currentUrl)

  });