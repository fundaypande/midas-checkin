<!DOCTYPE html>
<html>
    <head>
        <title>Title</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ url('css/uikit.min.css') }}" />
        <script src="{{ url('js/uikit.min.js')}}"></script>
        <script src="{{ url('js/uikit-icons.min.js') }}"></script>
        <script src="{{ url('js/jquery-3.4.1.min.js') }}"></script>
        <link rel="stylesheet" href="{{ url('css/pande.css') }}">

        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('css/bootstrap-material-datetimepicker.css') }}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">

        <link rel="stylesheet" href="{{ url('node_modules/dropzone/dist/min/dropzone.min.css') }}">

    </head>
    <body>
      @include('index.navbar')
      @include('index.under-navbar')

      @include('index.form-container')

      @include('index.modal-from')
      @include('index.modal-to')
      @include('index.modal-booking')
    </body>
</html>



<!-- <script src="https://unpkg.com/vue@2.6.10/dist/vue.js"></script> -->
<script>
    var urlSearch = "{{ url('/api/speedboats/') }}";
</script>
<script src="{{ url('js/index.js') }}"></script>
<script src="{{ url('js/moment.min.js') }}"></script>
<script src="{{ url('js/bootstrap-material-datetimepicker.js') }}"></script>
<script>
      $('#date-field').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY', time: false, minDate : new Date() });
      
      $('#from-field').on( "click", function() {
          element = $('#modal-from');
          UIkit.modal(element).show();
      });

      $('#to-field').on( "click", function() {
          element = $('#modal-to');
          UIkit.modal(element).show();
      });


      function setFrom(value, id){
        $('#from-field').val(value);
        $('#from-field-id').val(id);
        element = $('#modal-from');
        UIkit.modal(element).hide();
      }

      function setTo(value, id){
        $('#to-field').val(value);
        $('#to-field-id').val(id);
        element2 = $('#modal-to');
        UIkit.modal(element2).hide();
      }

      function openOrder(id) {
        element = $('#modal-booking');
        UIkit.modal(element).show();
      }

      function loginFb() {
        window.location.href = "{{ url('/auth/facebook') }}";
      }

      function loginGoogle() {
        window.location.href = "{{ url('/auth/google') }}";
      }

</script>
