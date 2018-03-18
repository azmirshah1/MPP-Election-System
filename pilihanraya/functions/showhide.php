    <script type="text/javascript">
        $(document).ready(function(e) {
          $('.nav-1').click(function(){
            $('.nav-1').addClass("active");
            $('.nav-2').removeClass("active");
            $('.nav-3').removeClass("active");
            $('.nav-4').removeClass("active");
            $('.nav-5').removeClass("active");
            $('.nav-6').removeClass("active");

            $('.voters').removeClass("hidden");
            $('.candidates').addClass("hidden");
            $('.result').addClass("hidden");
            $('.edit').addClass("hidden");
            $('.sched').addClass("hidden");
            $('.preview').addClass("hidden");
          });

          $('.nav-2').click(function(){
            $('.nav-1').removeClass("active");
            $('.nav-2').addClass("active");
            $('.nav-3').removeClass("active");
            $('.nav-4').removeClass("active");
            $('.nav-5').removeClass("active");
            $('.nav-6').removeClass("active");

            $('.voters').addClass("hidden");
            $('.candidates').removeClass("hidden");
            $('.result').addClass("hidden");
            $('.edit').addClass("hidden");
            $('.sched').addClass("hidden");
            $('.preview').addClass("hidden");
          });

          $('.nav-3').click(function(){
            $('.nav-1').removeClass("active");
            $('.nav-2').removeClass("active");
            $('.nav-3').addClass("active");
            $('.nav-4').removeClass("active");
            $('.nav-5').removeClass("active");
            $('.nav-6').removeClass("active");

            $('.voters').addClass("hidden");
            $('.candidates').addClass("hidden");
            $('.result').removeClass("hidden");
            $('.edit').addClass("hidden");
            $('.sched').addClass("hidden");
            $('.preview').addClass("hidden");
          });

          $('.nav-4').click(function(){
            $('.nav-1').removeClass("active");
            $('.nav-2').removeClass("active");
            $('.nav-3').removeClass("active");
            $('.nav-4').addClass("active");
            $('.nav-5').removeClass("active");
            $('.nav-6').removeClass("active");

            $('.voters').addClass("hidden");
            $('.candidates').addClass("hidden");
            $('.result').addClass("hidden");
            $('.edit').removeClass("hidden");
            $('.sched').addClass("hidden");
            $('.preview').addClass("hidden");
          });

          $('.nav-5').click(function(){
            $('.nav-1').removeClass("active");
            $('.nav-2').removeClass("active");
            $('.nav-3').removeClass("active");
            $('.nav-4').removeClass("active");
            $('.nav-5').addClass("active");
            $('.nav-6').removeClass("active");

            $('.voters').addClass("hidden");
            $('.candidates').addClass("hidden");
            $('.result').addClass("hidden");
            $('.edit').addClass("hidden");
            $('.sched').removeClass("hidden");
            $('.preview').addClass("hidden");
          });

          $('.nav-6').click(function(){
            $('.nav-1').removeClass("active");
            $('.nav-2').removeClass("active");
            $('.nav-3').removeClass("active");
            $('.nav-4').removeClass("active");
            $('.nav-5').removeClass("active");
            $('.nav-6').addClass("active");

            $('.voters').addClass("hidden");
            $('.candidates').addClass("hidden");
            $('.result').addClass("hidden");
            $('.edit').addClass("hidden");
            $('.sched').addClass("hidden");
            $('.preview').removeClass("hidden");
          });

        });
    </script>