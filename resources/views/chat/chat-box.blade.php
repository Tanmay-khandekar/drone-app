<!--begin::Chat Panel-->
<div class="modal modal-sticky modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header align-items-center px-4 py-3">
                    <div class="text-left flex-grow-1"></div>
                    <div class="text-center flex-grow-1">
                        <div class="text-dark-75 font-weight-bold font-size-h5" id="username">Matt Pears</div>
                        <div>
                            <span class="label label-dot label-success"></span>
                            <span class="font-weight-bold text-muted font-size-sm">Active</span>
                        </div>
                    </div>
                    <div class="text-right flex-grow-1">
                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-dismiss="modal">
                            <i class="ki ki-close icon-1x"></i>
                        </button>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Scroll-->
                    <div class="scroll scroll-pull" data-height="400" data-mobile-height="350">
                        <!--begin::Messages-->
                        <div class="messages" id="chat-box">
                            
                        </div>
                        <!--end::Messages-->
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer align-items-center">
                    <!--begin::Compose-->
                    <form id="chat-form">
                        @csrf
                        <input type="hidden" name="fromuser" value="{{ Auth::id() }}">
                        <input type="hidden" id="touser" name="touser" value="">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                            <!-- <textarea class="form-control border-0 p-0" rows="2" id="message" onkeyup="msginput()" name="message" placeholder="Type a message"></textarea> -->
                                <input type="text" class="form-control border-0 p-0" id="message" onkeyup="msginput()" name="message" placeholder="Type a message">
                            </div>
                            <div>
                                <button type="button" id="btn-send" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
                            </div>
                        </div>
                    </form>
                    <!--begin::Compose-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Card-->
        </div>
    </div>
</div>
<!--end::Chat Panel-->