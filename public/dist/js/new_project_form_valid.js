/**
 * Created by Mohamed-Zain on 3/5/2020.
 */
function Provalid() {

    if (document.getElementById("ProName")) {

        var number = document.getElementById("ProName").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء ملئ حقل اسم المشروع" , "error");

            return false;

        }

    }

    if (document.getElementById("BranchID")) {

        var number = document.getElementById("BranchID").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء اختيار الفرع" , "error");
            return false;

        }

    }

    if (document.getElementById("ProType")) {

        var number = document.getElementById("ProType").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء اختيار نوع المشروع" , "error");
            return false;

        }

    }

    if (document.getElementById("ProManager")) {

        var number = document.getElementById("ProManager").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء اختيار مشرف المشروع" , "error");
             return false;

        }

    }

    if (document.getElementById("AgenName")) {

        var number = document.getElementById("AgenName").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء اختيار  العميل" , "error");

            return false;

        }

    }

    if (document.getElementById("teams")) {

        var number = document.getElementById("teams").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء اختيار  فريق العمل" , "error");
            return false;

        }

    }

    if (document.getElementById("Country")) {

        var number = document.getElementById("Country").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء كتابة الدولة" , "error");
            return false;

        }

    }

    if (document.getElementById("Emirate")) {

        var number = document.getElementById("Emirate").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();

            swal("خطأ","الرجاء كتابة الامارة او المنطقة" , "error");
            return false;

        }

    }

    if (document.getElementById("Neighborhood")) {

        var number = document.getElementById("Neighborhood").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء كتابة الحي" , "error");

            return false;

        }

    }

    if (document.getElementById("Streetnumber")) {

        var number = document.getElementById("Streetnumber").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء كتابة رقم الشارع" , "error");
            return false;

        }

    }

    if (document.getElementById("PlotNO")) {

        var number = document.getElementById("PlotNO").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء كتابة رقم القطعة" , "error");

            return false;

        }

    }

    if (document.getElementById("VoucherNumber")) {

        var number = document.getElementById("VoucherNumber").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء كتابة رقم القسيمة" , "error");

            return false;

        }

    }

    if (document.getElementById("Instrumentnumber")) {

        var number = document.getElementById("Instrumentnumber").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء كتابة رقم صك الارض" , "error");
            return false;

        }

    }

    if (document.getElementById("MapsUrl")) {

        var number = document.getElementById("MapsUrl").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء كتابة رابط موقع المشروع" , "error");

            return false;

        }

    }

    if (document.getElementById("benarNO")) {

        var number = document.getElementById("benarNO").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء كتابة رقم البينار" , "error");

            return false;

        }

    }

    if (document.getElementById("KoNO")) {

        var number = document.getElementById("KoNO").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء كتابة رقم الاشتراك (خيرعون" , "error");

            return false;

        }

    }

    if (document.getElementById("Price")) {

        var number = document.getElementById("Price").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء كتابة قيمة الاشتراك" , "error");

            return false;

        }

    }

    if (document.getElementById("RequestDate")) {

        var number = document.getElementById("RequestDate").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء كتابة تاريخ رفع الطلب" , "error");

            return false;

        }

    }

    if (document.getElementById("ActivatDate")) {

        var number = document.getElementById("ActivatDate").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء كتابة تاريخ تفعيل الباقة" , "error");

            return false;

        }

    }

    if (document.getElementById("Package")) {

        var number = document.getElementById("Package").value;


        if (number == "") {
            var audio = document.getElementById("audioError");
            audio.play();
            swal("خطأ","الرجاء اختيار الباقة" , "error");

            return false;

        }

    }



}