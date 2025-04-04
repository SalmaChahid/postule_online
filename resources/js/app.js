import './bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;
import 'select2';

document.addEventListener("DOMContentLoaded", function () {
    fetch("/ma.json") // جلب المدن
        .then(response => response.json())
        .then(data => {
            let select = document.getElementById("ville");
            data.forEach(ville => {
                let option = document.createElement("option");
                option.value = ville.city;
                option.textContent = ville.city;
                select.appendChild(option);
            });
        })
        .catch(error => console.error("error", error));
});

$(document).ready(function () {
    $('#fonction').on('change', function () {
        let fonctionNom = $(this).val(); // الحصول على اسم الوظيفة
        
        if (fonctionNom) {
            $.ajax({
                url: `/types-par-nom/${fonctionNom}`, // إرسال اسم الوظيفة إلى السيرفر
                type: 'GET',
                success: function (data) {
                    $('#type_de_fonction').empty(); // مسح الخيارات القديمة
                    $('#type_de_fonction').append('<option value="" selected disabled hidden></option>');
                    $.each(data, function (key, type) {
                        $('#type_de_fonction').append(`<option value="${type.nom}">${type.nom}</option>`);
                    });
                },
            });
        }
    });
});



document.addEventListener('DOMContentLoaded', function () {
    const typePieceSelect = document.getElementById('type_piece');
    const autreField = document.getElementById('otherField');
    const autreInput = document.getElementById('autreF');

    // دالة لتحديث الحقل "Autre" وقيمة type_piece
    function updateAutreField() {
        if (typePieceSelect.value === 'Autre') {
            // إظهار الحقل "Autre" وجعل المدخل مطلوبًا
            autreField.style.display = 'block';
            autreInput.setAttribute('required', 'required');
            
            // عند تغيير قيمة الحقل "Autre"، نقوم بتحديث قيمة select ليبقى "Autre"
            autreInput.addEventListener('input', function() {
                typePieceSelect.value = 'Autre';  // تحديث قيمة select ليبقى "Autre"
            });
        } else {
            // إخفاء الحقل "Autre" وإزالة شرط "required"
            autreField.style.display = 'none';
            autreInput.removeAttribute('required');
        }
    }

    // التحقق من الخيار عند تحميل الصفحة
    updateAutreField();

    // إضافة حدث عند تغيير الاختيار
    typePieceSelect.addEventListener('change', updateAutreField);
});



document.addEventListener('DOMContentLoaded', function () {
    const typePieceSelect = document.getElementById('niveau_d_étude');
    const autreField = document.getElementById('otherFieldd');
    const autreInput = document.getElementById('autreN');

    // دالة لتحديث الحقل "Autre" وقيمة type_piece
    function updateAutreField() {
        if (typePieceSelect.value === 'Autre') {
            // إظهار الحقل "Autre" وجعل المدخل مطلوبًا
            autreField.style.display = 'block';
            autreInput.setAttribute('required', 'required');
            
            // عند تغيير قيمة الحقل "Autre"، نقوم بتحديث قيمة select ليبقى "Autre"
            autreInput.addEventListener('input', function() {
                typePieceSelect.value = 'Autre';  // تحديث قيمة select ليبقى "Autre"
            });
        } else {
            // إخفاء الحقل "Autre" وإزالة شرط "required"
            autreField.style.display = 'none';
            autreInput.removeAttribute('required');
        }
    }

    // التحقق من الخيار عند تحميل الصفحة
    updateAutreField();

    // إضافة حدث عند تغيير الاختيار
    typePieceSelect.addEventListener('change', updateAutreField);
});





