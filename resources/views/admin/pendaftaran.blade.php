@extends('layouts.dashboard.base')

@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">{{ $title }}</h1>
    </div>
    <!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </div>
    <!-- /.col -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.pendaftaran_post') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Nama">Nama</label>
                                <input type="text" name="name" class="form-control" id="Nama" placeholder="Masukan Nama">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="NIK">NIK</label>
                                <input type="number" name="nik" class="form-control" id="NIK" placeholder="Masukan NIK">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tanggal Lahir</label>
                                <div class="input-group date" id="birthdayDate" data-target-input="nearest">
                                    <input type="text" name="birthday" class="form-control datetimepicker-input" data-target="#birthdayDate">
                                    <div class="input-group-append" data-target="#birthdayDate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Jenis Kelamin</label>
                                <select name="gender" class="form-control form-select">
                                    <option selected="selected">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Nomor Telpon">Nomor Telpon</label>
                                <input type="text" name="phone" class="form-control" id="Nomor Telpon" placeholder="Masukan Nomor Telpon">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Nama Ayah">Nama Ayah</label>
                                <input type="text" name="father_name" class="form-control" id="Nama Ayah" placeholder="Masukan Nama Ayah">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Nama Ibu">Nama Ibu</label>
                                <input type="text" name="mother_name" class="form-control" id="Nama Ibu" placeholder="Masukan Nama Ibu">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Alamat">Alamat</label>
                                <input type="text" name="address" class="form-control" id="Alamat" placeholder="Masukan Alamat">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-12 -->
    </div>
    <!-- /.row -->
@endsection

@section('js')
    <!-- Page specific script -->
    <script>
        $(function() {
            //Date range picker
            $('#birthdayDate').datetimepicker({
                format: 'L'
            });

            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
    </script>
@endsection
