<div class="footer">
            <div>
                Copyright <strong style="color: #153531;">Cube Digital</strong> &copy; <?php echo date("Y"); ?> <span class="pull-right">Cube Communications</span>
            </div>
        </div>


<!-- Mainly scripts -->
    <script src="<?php linkto('js/jquery-2.1.1.js'); ?>"></script>
    <script src="<?php linkto('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php linkto('js/plugins/metisMenu/jquery.metisMenu.js'); ?>"></script>
    <script src="<?php linkto('js/plugins/slimscroll/jquery.slimscroll.min.js'); ?>"></script>
    <script src="<?php linkto('js/plugins/jeditable/jquery.jeditable.js'); ?>"></script>

    <!-- Data Tables -->
    <script src="<?php linkto('js/plugins/dataTables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php linkto('js/plugins/dataTables/dataTables.bootstrap.js'); ?>"></script>
    <script src="<?php linkto('js/plugins/dataTables/dataTables.responsive.js'); ?>"></script>
    <script src="<?php linkto('js/plugins/dataTables/dataTables.tableTools.min.js'); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php linkto('js/inspinia.js'); ?>"></script>
    <script src="<?php linkto('js/plugins/pace/pace.min.js'); ?>"></script>

    <script src="<?php linkto('js/plugins/chosen/chosen.jquery.js'); ?>"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );

            var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>

<!-- Jquery Validate -->
<script src="<?php linkto('js/plugins/validate/jquery.validate.min.js'); ?>"></script>
<script>
     $(document).ready(function(){

        $("#userForm").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6
                },
                new_password: {
                    required: true,
                    minlength: 6
                }
            }
        });
    });
</script>