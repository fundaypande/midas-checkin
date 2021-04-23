(function($) {
    $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
    };
    }(jQuery));
    
    
    function formatAngka(angka) {
     if (typeof(angka) != 'string') angka = angka.toString();
     var reg = new RegExp('([0-9]+)([0-9]{3})');
     while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
     return angka;
    }
    
    function rupiah(field){
      field.on('keypress', function(e) {
         var c = e.keyCode || e.charCode;
         switch (c) {
          case 8: case 9: case 27: case 13: return;
          case 65:
           if (e.ctrlKey === true) return;
         }
         if (c < 48 || c > 57) e.preventDefault();
        }).on('keyup', function() {
         var inp = $(this).val().replace(/\./g, '');
    
         // set nilai ke variabel bayar
         $(this).val(formatAngka(inp));
        });
    }
    
    function justNum(field){
      field.on('keypress', function(e) {
         var c = e.keyCode || e.charCode;
         switch (c) {
          case 8: case 9: case 27: case 13: return;
          case 65:
           if (e.ctrlKey === true) return;
         }
         if (c < 48 || c > 57) e.preventDefault();
        }).on('keyup', function() {
         var inp = $(this).val().replace(/\./g, '');
    
         // set nilai ke variabel bayar
         $(this).val(inp);
        });
    }
    