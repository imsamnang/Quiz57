
<div id="sidebar" class="sidebar h-sidebar navbar-collapse collapse ace-save-state hidden-print">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>

    <ul class="nav nav-list">
        {{-- Dashboard --}}
        <li class="{!! request()->is('/')?'active':'' !!}">
            <a href="{{ route('home') }}" >
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> @lang('m_dashboard') </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
        </li>

        {{-- Staff & Student --}}
        @ability('super-admin','student-staff')
        <li class="{!! request()->is('student*')||request()->is('staff*')?'active open':'' !!}  hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-users" aria-hidden="true"></i>
                <span class="menu-text"> @lang('m_student_staff')</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{!! request()->is('student*')?'active open':'' !!} hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_student')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="{!! request()->is('student')?'active':'' !!} hover">
                            <a href="{{ route('student') }}" accesskey="S">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_student_detail')
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('student/registration')?'active':'' !!} hover">
                            <a href="{{ route('student.registration') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_registration')
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('student/transfer')?'active':'' !!} hover">
                            <a href="{{ route('student.transfer') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_transfer_student')
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('student/document')?'active':'' !!} hover">
                            <a href="{{ route('student.document') }}"  accesskey="U">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_document_upload')
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('student/note')?'active':'' !!} hover">
                            <a href="{{ route('student.note') }}">
                                <i class="menu-icon fa fa-caret-right"  accesskey="N"></i>
                                @lang('m_create_note')
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="{!! request()->is('staff*')?'active open':'' !!} hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_staff')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="{!! request()->is('staff')?'active':'' !!}  hover">
                            <a href="{{ route('staff') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_staff_detail')
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('staff/add')?'active':'' !!}  hover">
                            <a href="{{ route('staff.add') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_statff_registration')
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('staff/document')?'active':'' !!} hover">
                            <a href="{{ route('staff.document') }}"  accesskey="U">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_staff_document_upload')
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('staff/note')?'active':'' !!} hover">
                            <a href="{{ route('staff.note') }}">
                                <i class="menu-icon fa fa-caret-right"  accesskey="N"></i>
                                @lang('m_staff_create_notes')
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('staff/designation')?'active':'' !!} hover">
                            <a href="{{ route('staff.designation') }}">
                                <i class="menu-icon fa fa-caret-right"  accesskey="N"></i>
                                @lang('m_designations')
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        @endability

        {{-- Account --}}
        @ability('super-admin','account')
        <li class="{!! request()->is('account/*')?'active open':'' !!}  hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-calculator" aria-hidden="true"></i>
                <span class="menu-text">@lang('m_account')</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{!! request()->is('account/fees*')?'active open':'' !!} hover">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-caret-right"></i>
                            @lang('m_fees_collection')
                            <b class="arrow fa fa-angle-r"></b>
                        </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="{!! request()->is('account/fees')?'active':'' !!}  hover">
                            <a href="{{ route('account.fees') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_receive_detail')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('account/fees/collection')?'active':'' !!} hover">
                            <a href="{{ route('account.fees.collection') }}" accesskey="R">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_collect_fees')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('account/fees/balance')?'active':'' !!}  hover">
                            <a href="{{ route('account.fees.balance') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_balance_fees_report')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('account/fees/master/add')?'active':'' !!} hover">
                            <a href="{{ route('account.fees.master.add') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_add_fees')
                            </a>
                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('account/fees/head')?'active':'' !!}  hover">
                            <a href="{{ route('account.fees.head') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_fees_head')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        </ul>
                    </li>

                <li class="{!! request()->is('account/transaction*')?'active open':'' !!} hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_income_expenses')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="{!! request()->is('account/transaction')?'active':'' !!} hover">
                            <a href="{{ route('account.transaction') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_transaction')
                            </a>
                        </li>
                        <li class="{!! request()->is('account/transaction-head')?'active':'' !!} hover">
                            <a href="{{ route('account.transaction-head') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_transaction_head')
                            </a>

                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li>

                <li class="{!! request()->is('account/payroll*')?'active open':'' !!} hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                       @lang('m_payroll')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="{!! request()->is('account/salary/payment')?'active':'' !!} hover">
                            <a href="{{ route('account.salary.payment') }}" accesskey="R">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_salary_pay')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('account/payroll/master*')?'active':'' !!} hover">
                            <a href="{{ route('account.payroll.master.add') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('ms_add_salary')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('account/payroll/balance')?'active':'' !!}  hover">
                            <a href="{{ route('account.payroll.balance') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('ms_balance_salary_report')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('account/payroll/head')?'active':'' !!}  hover">
                            <a href="{{ route('account.payroll.head') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('ms-salary-head')
                            </a>

                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li>
            </ul>
        </li>
        @endability

        {{-- Library --}}
        @ability('super-admin','library')
        <li class="{!! request()->is('library*')?'active':'' !!} hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-book" aria-hidden="true"></i>
                <span class="menu-text">@lang('m_library')</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{!! request()->is('library/book*')?'active':'' !!} hover">
                    <a href="{{ route('library.book') }}" accesskey="L">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_books')
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{!! request()->is('library/member*') || request()->is('library/student*') || request()->is('library/staff*') ?'active':'' !!} hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_members')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="{!! request()->is('library/member*')?'active':'' !!} hover">
                            <a href="{{ route('library.member') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_membership')
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('library/student*')?'active':'' !!} hover">
                            <a href="{{ route('library.student') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_student_member')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('library/staff*')?'active':'' !!} hover">
                            <a href="{{ route('library.staff') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_staff_member')
                            </a>

                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li>


                <li class="{!! request()->is('library/issue-history*')?'active':'' !!} hover">
                    <a href="{{ route('library.issue-history') }}">
                        <i class="menu-icon fa fa-history"></i>
                        @lang('m_issue_history')
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{!! request()->is('library/return-over*')?'active':'' !!} hover">
                    <a href="{{ route('library.return-over') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_return_period_over')
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{!! request()->is('library/circulation*')?'active':'' !!}  hover">
                    <a href="{{ route('library.circulation') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_circulation_setting')
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        @endability

        {{-- Attendance --}}
        @ability('super-admin','attendance')
        <li class="{!! request()->is('attendance*')?'active':'' !!} hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-calendar" aria-hidden="true"></i>
                <span class="menu-text"> @lang('m_attendence')</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{!! request()->is('attendance/student*')?'active':'' !!} hover">
                    <a href="{{ route('attendance.student') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Student_Attendance')
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{!! request()->is('attendance/staff*')?'active':'' !!} hover">
                    <a href="{{ route('attendance.staff') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Staff_Attendance')
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{!! request()->is('attendance/master*')?'active':'' !!} hover">
                    <a href="{{ route('attendance.master') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Monthly_Calendar')
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>
        @endability

        {{-- Examination --}}
        @ability('super-admin','examination')
        <li class="{!! request()->is('exam*')?'active':'' !!} hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-line-chart"  aria-hidden="true"></i>
                <span class="menu-text"> @lang('m_Examination')</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{!! request()->is('exam/schedule*')?'active':'' !!} hover">
                    <a href="{{ route('exam.schedule') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Schedule_Exam')
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="{!! request()->is('exam/mark-ledger')?'active':'' !!}  hover">
                    <a href="{{ route('exam.mark-ledger') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Mark_Ledger')
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="{!! request()->is('exam')?'active':'' !!} hover">
                    <a href="{{ route('exam') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Exams_Head')
                    </a>
                    <b class="arrow"></b>
                </li>


                <li class="hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Print')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="{!! request()->is('exam/admit-card*')?'active':'' !!} hover">
                            <a href="{{ route('exam.admit-card') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Admit_Card')
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('exam/routine*')?'active':'' !!} hover">
                            <a href="{{ route('exam.routine') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Routine')
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('exam/mark-sheet*')?'active':'' !!} hover">
                            <a href="{{ route('exam.mark-sheet') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Grade_Mark_Sheet')
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        @endability

        {{-- Hostel --}}
        @ability('super-admin','hostel')
        <li class="{!! request()->is('hostel*')?'active':'' !!} hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon  fa fa-bed" aria-hidden="true"></i>
                <span class="menu-text"> @lang('m_Hostels') </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{!! request()->is('hostel/resident*')?'active':'' !!} hover">
                    <a href="{{ route('hostel.resident') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Resident')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="{!! request()->is('hostel/resident')?'active':'' !!} hover">
                            <a href="{{ route('hostel.resident') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Detail')
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('hostel/resident/add')?'active':'' !!} hover">
                            <a href="{{ route('hostel.resident.add') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('ms_Registration')
                            </a>
                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('hostel/resident/history')?'active':'' !!} hover">
                            <a href="{{ route('hostel.resident.history') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Occupant_History')
                            </a>
                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li>
                <li class="{!! request()->is('hostel*')?'active':'' !!} hover">
                    <a href="{{ route('hostel') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('ms_Hostel')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">

                        <li class="{!! request()->is('hostel*')?'active':'' !!} hover">
                            <a href="{{ route('hostel') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('mss_Hostel')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('hostel/room-type*')?'active':'' !!} hover">
                            <a href="{{ route('hostel.room-type') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Room_Type')
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="{!! request()->is('hostel/food*')?'active':'' !!} hover">
                    <a href="{{ route('hostel') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Food_Meal')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="{!! request()->is('hostel/food*')?'active':'' !!} hover">
                            <a href="{{ route('hostel.food') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Meal_Schedule')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('hostel/food/eating-time*')?'active':'' !!} hover">
                            <a href="{{ route('hostel.food.eating-time') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Eating_Time')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('hostel/food/category*')?'active':'' !!} hover">
                            <a href="{{ route('hostel.food.category') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Food_Category')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('hostel/food/item*')?'active':'' !!} hover">
                            <a href="{{ route('hostel.food.item') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Food_Item')
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        @endability

        {{-- Transport --}}
        @ability('super-admin','transport')
        <li class="{!! request()->is('transport*')?'active':'' !!} hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon  fa fa-bus" aria-hidden="true"></i>
                <span class="menu-text"> @lang('m_Transport') </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
             <ul class="submenu">
                 <li class="{!! request()->is('transport/user*')?'active':'' !!} hover">
                     <a href="{{ route('transport.user') }}">
                         <i class="menu-icon fa fa-caret-right"></i>
                         @lang('m_Traveler_User')
                         <b class="arrow fa fa-angle-r"></b>
                     </a>
                     <b class="arrow"></b>
                     <ul class="submenu">
                         <li class="{!! request()->is('transport/user')?'active':'' !!} hover">
                             <a href="{{ route('transport.user') }}">
                                 <i class="menu-icon fa fa-caret-right"></i>
                                 @lang('ms_Detail')
                             </a>
                             <b class="arrow"></b>
                         </li>
                         <li class="{!! request()->is('transport/user/add')?'active':'' !!} hover">
                             <a href="{{ route('transport.user.add') }}">
                                 <i class="menu-icon fa fa-caret-right"></i>
                                 @lang('mss_Registration')
                             </a>
                             <b class="arrow"></b>
                         </li>

                         <li class="{!! request()->is('transport/user/history')?'active':'' !!} hover">
                             <a href="{{ route('transport.user.history') }}">
                                 <i class="menu-icon fa fa-caret-right"></i>
                                 @lang('m_User_History')
                             </a>
                             <b class="arrow"></b>
                         </li>

                     </ul>
                 </li>
                 <li class="{!! request()->is('transport/route*')?'active':'' !!} hover">
                     <a href="{{ route('transport.route') }}">
                         <i class="menu-icon fa fa-caret-right"></i>
                         @lang('mss_Route')
                         <b class="arrow fa fa-angle-r"></b>
                     </a>
                     <b class="arrow"></b>
                 </li>

                 <li class="{!! request()->is('transport/vehicle*')?'active':'' !!} hover">
                     <a href="{{ route('transport.vehicle') }}">
                         <i class="menu-icon fa fa-caret-right"></i>
                         @lang('m_Vehicle')
                         <b class="arrow fa fa-angle-r"></b>
                     </a>
                     <b class="arrow"></b>
                 </li>

             </ul>
        </li>
        @endability

        {{-- More --}}
        @ability('super-admin','assignment,download')
        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon  fa fa-th-list" aria-hidden="true"></i>
                <span class="menu-text"> @lang('m_More') </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                @ability('super-admin','assignment')
                <li class="{!! request()->is('assignment')?'active':'' !!} hover">
                    <a href="{{ route('assignment') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Assignment')
                    </a>
                    <b class="arrow"></b>
                </li>
                @endability

                @ability('super-admin','download')
                <li class="{!! request()->is('download*')?'active':'' !!} hover">
                    <a href="{{ route('download') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Upload_Download')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                </li>
                @endability
            </ul>
        </li>
        @endability

        {{-- Reports --}}
        @ability('super-admin','report')
        <li class="{!! request()->is('report*')?'active':'' !!} hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bar-chart"  aria-hidden="true"></i>
                <span class="menu-text"> @lang('m_Report')</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{!! request()->is('report/student*')?'active':'' !!} hover">
                    <a href="{{ route('report.student') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('ms_Student')
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{!! request()->is('report/staff*')?'active':'' !!} hover">
                    <a href="{{ route('report.staff') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('ms_Staff')
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{!! request()->is('account/fees/balance')?'active':'' !!} hover">
                    <a href="{{ route('account.fees.balance') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Due_Fees')
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="{!! request()->is('account/payroll/balance')?'active':'' !!} hover">
                    <a href="{{ route('account.payroll.balance') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Due_Salary')
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="{!! request()->is('library/return-over')?'active':'' !!} hover">
                    <a href="{{ route('library.return-over') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Library_Return_Period_Over')
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        @endability

        {{-- Info Center --}}
        @ability('super-admin','alert-center')
        <li class="{!! request()->is('info*')?'active':'' !!} hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bullhorn" aria-hidden="true"></i>
                <span class="menu-text"> @lang('m_Alert') </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{!! request()->is('info/notice*')?'active':'' !!} hover">
                    <a href="{{ route('info.notice') }}" accesskey="L">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_User_Notice')
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="{!! request()->is('info/smsemail*')?'active':'' !!} hover">
                    <a href="{{ route('info.smsemail') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_SMS_Email')
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>
        @endability

        {{-- Academic --}}
        @ability('super-admin','academic')
        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon  fa fa-graduation-cap" aria-hidden="true"></i>
                <span class="menu-text"> @lang('m_Academics') </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{!! request()->is('faculty*') || request()->is('semester*')?'active':'' !!} hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Academic_Level')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="{!! request()->is('faculty*')?'active':'' !!} hover">
                            <a href="{{ route('faculty') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Faculty_Level_Class')
                            </a>
                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('semester*')?'active':'' !!} hover">
                            <a href="{{ route('semester') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Semester_Section')
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="{!! request()->is('grading*') || request()->is('subject*')?'active':'' !!} hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Grading_Subject')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="{!! request()->is('grading*')?'active':'' !!} hover">
                            <a href="{{ route('grading') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Grading')
                            </a>
                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('subject*')?'active':'' !!} hover">
                            <a href="{{ route('subject') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Course_Subject')
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="{!! request()->is('*status')?'active':'' !!} hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Status_Setting')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="{!! request()->is('student-status*')?'active':'' !!} hover">
                            <a href="{{ route('student-status') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Student_Status')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('attendance-status*')?'active':'' !!} hover">
                            <a href="{{ route('attendance-status') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Attendance_Status')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('book-status*')?'active':'' !!} hover">
                            <a href="{{ route('book-status') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Books_Status')
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('bed-status*')?'active':'' !!} hover">
                            <a href="{{ route('bed-status') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Hostel_Bed_Status')
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>


                <li class="{!! request()->is('year*') || request()->is('month*')?'active':'' !!} hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        @lang('m_Year_Month')
                        <b class="arrow fa fa-angle-r"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="{!! request()->is('year*')?'active':'' !!} hover">
                            <a href="{{ route('year') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Year')
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('month*')?'active':'' !!} hover">
                            <a href="{{ route('month') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Month')
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="{!! request()->is('day*')?'active':'' !!} hover">
                            <a href="{{ route('day') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('m_Day')
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        @endability

        {{-- Translations --}}
{{--         @ability('super-admin','alert-center') --}}
        {{--  <li class="{!! request()->is('locale*')?'active':'' !!} hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-language" aria-hidden="true"></i>
                <span class="menu-text"> @lang('mss_Translations') </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{!! request()->is('locale*')?'active':'' !!} hover">
                    <a href="{{ route('languages') }}" accesskey="L" target="blank">
                        <i class="menu-icon fa fa-language" aria-hidden="true"></i>
                        @lang('m_Language_Translations')
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>  --}}
{{--         @endability --}}



        {{-- Student Health --}}
{{--         @ability('super-admin','alert-center') --}}

{{-- <li class="{!! request()->is('locale*')?'active':'' !!} hover">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-medkit" aria-hidden="true"></i>
        <!-- <span class="menu-text"> @lang('mss_Translations') </span> -->
        <span class="menu-text"> @lang('stu_health_manage') </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        <li class="{!! request()->is('locale*')?'active':'' !!} hover">
            <a href="{{ route('studenthealth') }}" accesskey="L">
                <i class="menu-icon fa fa-medkit" aria-hidden="true"></i>
                <!-- @lang('m_Language_Translations') -->
                @lang('stu_health_list')
            </a>
            <b class="arrow"></b>
        </li>

        <li class="{!! request()->is('locale*')?'active':'' !!} hover">
            <a href="{{ route('student') }}" accesskey="L" target="blank">
                <i class="menu-icon fa fa-medkit" aria-hidden="true"></i>
                <!-- @lang('m_Language_Translations') -->
                @lang('lesson.health')
            </a>
            <b class="arrow"></b>
        </li>

        <li class="{!! request()->is('locale*')?'active':'' !!} hover">
            <a href="{{ route('student') }}" accesskey="L" target="blank">
                <i class="menu-icon fa fa-medkit" aria-hidden="true"></i>
                <!-- @lang('m_Language_Translations') -->
                @lang('teacher.health')
            </a>
            <b class="arrow"></b>
        </li>

        <li class="{!! request()->is('locale*')?'active':'' !!} hover">
            <a href="{{ route('student') }}" accesskey="L" target="blank">
                <i class="menu-icon fa fa-medkit" aria-hidden="true"></i>
                <!-- @lang('m_Language_Translations') -->
                @lang('Report.health')
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                        <li class="{!! request()->is('faculty*')?'active':'' !!} hover">
                            <a href="{{ route('faculty') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('H.Quarterly-Report')
                            </a>
                            <b class="arrow"></b>
                        </li>

                        <li class="{!! request()->is('semester*')?'active':'' !!} hover">
                            <a href="{{ route('semester') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                @lang('H.Monthly-report')
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
        </li>

        <li class="{!! request()->is('locale*')?'active':'' !!} hover">
            <a href="{{ route('student') }}" accesskey="L" target="blank">
                <i class="menu-icon fa fa-medkit" aria-hidden="true"></i>
                <!-- @lang('m_Language_Translations') -->
                @lang('H.Partner-medicines')
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
</li> --}}



{{--         @endability --}}


    </ul><!-- /.nav-list -->
</div>
