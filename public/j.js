// تعريف الدالة لتبديل حالة العرض للمحتوى وإخفاء الآخرين
function toggleContent(contentId, otherContents) {
    var content = document.getElementById(contentId);
    var isCurrentlyDisplayed = content.style.display !== "none";

    // إخفاء جميع المحتويات أولاً
    otherContents.forEach(function(otherContentId) {
        var otherContent = document.getElementById(otherContentId);
        if (otherContent) {
            otherContent.style.display = "none";
        }
    });

    // تبديل حالة العرض للمحتوى المحدد
    content.style.display = isCurrentlyDisplayed ? "none" : "block";
}

// استدعاء الدالة عند الضغط على الزر مع تمرير المعرفات الأخرى
document.addEventListener('DOMContentLoaded', (event) => {
    var allContents = ['taskContent', 'typeContent', 'about', 'contact-form'];

    document.getElementById('toggleTasksButton').addEventListener('click', function() {
        toggleContent('taskContent', allContents);
    });
    document.getElementById('toggleTypeButton').addEventListener('click', function() {
        toggleContent('typeContent', allContents);
    });
    document.getElementById('about-btn').addEventListener('click', function() {
        toggleContent('about', allContents);
    });
    document.getElementById('contact-form-btn').addEventListener('click', function() {
        toggleContent('contact-form', allContents);
    });
});
// JavaScript لتبديل الفورم
document.getElementById('toggleFormButton').addEventListener('click', function() {
    var formContainer = document.getElementById('formContainer');
    if (formContainer.style.display === 'none') {
        formContainer.style.display = 'block';
    } else {
        formContainer.style.display = 'none';
    }
});
