$(document).ready(function () {
    function setDateRange() {
        const today = new Date();
        const startDate = new Date(today.getFullYear(), today.getMonth(), 1); // 1-е число текущего месяца
        const endDate = new Date(today.getFullYear(), today.getMonth() + 1, 0); // Последнее число текущего месяца

        // Форматирование даты в формате YYYY-MM-DD
        function formatDate(date) {
            let d = date.getDate();
            let m = date.getMonth() + 1; // Месяцы начинаются с 0
            let y = date.getFullYear();
            return y + '-' + (m < 10 ? '0' + m : m) + '-' + (d < 10 ? '0' + d : d);
        }

        // Установка значений в поля ввода
        $('#start-date').val(formatDate(startDate));
        $('#end-date').val(formatDate(endDate));
    }

    setDateRange();

    // Инициализация Datepicker
    $("#start-date").datepicker({
        dateFormat: "yy-mm-dd" // Формат даты
    });

    $("#end-date").datepicker({
        dateFormat: "yy-mm-dd" // Формат даты
    });
});