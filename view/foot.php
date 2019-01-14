        <div id="sample-modal" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="background-color: black;border-color:grey">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span style="color:white" aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Details</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                        Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In dignissim laoreet velit vel aliquet. Maecenas lacinia erat vitae aliquam pellentesque. Donec at magna volutpat, ultricies sem vitae, mollis risus. Morbi porttitor pellentesque ultricies. Fusce turpis quam, volutpat auctor hendrerit id, vulputate sed ligula. Nam in hendrerit felis, ac dapibus enim. Fusce rutrum turpis at suscipit efficitur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam id urna ut lectus volutpat aliquam. Donec auctor, sapien sagittis molestie venenatis, dui sapien sagittis neque, pellentesque accumsan sapien lorem vel lacus. Duis metus dui, congue a ante at, tincidunt lobortis leo.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Skyron Srl C.F. 04216790164</p>
            </div>
        </footer>
        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php foreach($js as $js_) { ?>
        <script src="<?= $js_ ?>"></script>
<?php } ?>
    </body>
</html>
