<x-app-layout>
    @section('title', 'Schedule')
    <x-slot name="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-center">
            <div class="card col-md-8">
                <div class="card-header bg-white justify-content-start">
                    <div class="form-inline text-lg mr-4">
                        <a href="{{ route('schedules') }}" class="close mr-3">
                            <span aria-hidden="true">&times;</span>
                        </a>
                        <span class="modal-title" id="viewFormEmployeeLabel">Schedule</span>
                    </div>
                </div>
                <div class="card-body" @style('overflow-y: auto;')>
                    <div class="container-fluid py-3">
                        <form id="scheduleForm" method="post" action="{{ route('save-schedule') }}">@csrf
                            <div class="row my-2">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name">Schedule Name</label>
                                        <input type="text" class="form-control bg-light" placeholder="Enter name.." id="name" name="schedule_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="type">Employee Type</label>
                                        <select name="employee_type" class="form-control bg-light">
                                            <option value="Permanent">Permanent</option>
                                            <option value="Contract">Contract</option>
                                            <option value="Probation">Probation</option>
                                            <option value="Service Bond">Service Bond</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="start">Start Date</label>
                                        <input type="date" name="start_date" class="form-control bg-light" id="start" placeholder="mm/dd/yyyy">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="end">End Date</label>
                                        <input type="date" name="end_date" class="form-control bg-light" id="end" placeholder="mm/dd/yyyy">
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox_reminder" name="checkbox_reminder" value="1">
                                            <label class="custom-control-label" for="checkbox_reminder">Reminder</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="reminders" hidden>
                                <div class="row">
                                    <div class="col-md">
                                        <label for="repeatDays">Repeat On</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group w-75" id="repeatDays" role="group" aria-label="Repeat Days">
                                            <button type="button" name="repeat_days[]" value="Mon" class="btn btn-outline-primary btn-sm day-button">Mon</button>
                                            <button type="button" name="repeat_days[]" value="Tue" class="btn btn-outline-primary btn-sm day-button">Tue</button>
                                            <button type="button" name="repeat_days[]" value="Wed" class="btn btn-outline-primary btn-sm day-button">Wed</button>
                                            <button type="button" name="repeat_days[]" value="Thu" class="btn btn-outline-primary btn-sm day-button">Thu</button>
                                            <button type="button" name="repeat_days[]" value="Fri" class="btn btn-outline-primary btn-sm day-button">Fri</button>
                                            <button type="button" name="repeat_days[]" value="Sat" class="btn btn-outline-primary btn-sm day-button">Sat</button>
                                            <button type="button" name="repeat_days[]" value="Sun" class="btn btn-outline-primary btn-sm day-button">Sun</button>
                                            <button type="button" class="btn btn-primary btn-sm" id="select-all">Select All</button>
                                        </div>          
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="messages">Messages</label>
                                            <textarea name="messages" id="messages" rows="5" class="form-control bg-light" placeholder="Enter message.."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md d-sm-flex justify-content-end">
                                    <input type="hidden" name="repeat_days_selected" id="repeatDaysSelected">
                                    <button type="submit" class="btn btn-primary shadow px-4">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>
<!-- Tambahkan script JavaScript untuk mengumpulkan nilai repeat_days[] -->
<script>
    document.getElementById('scheduleForm').addEventListener('submit', function() {
        var repeatDaysButtons = document.getElementsByName('repeat_days[]');
        var repeatDaysSelected = [];
        repeatDaysButtons.forEach(function(button) {
            if (button.classList.contains('active')) {
                repeatDaysSelected.push(button.value);
            }
        });
        document.getElementById('repeatDaysSelected').value = repeatDaysSelected.join(',');
    });
</script>