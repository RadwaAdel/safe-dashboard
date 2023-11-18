<style>
    .search-btn {
        position: relative;
        left: 0;
    }

    .search-btn:hover svg{
        fill: #fff;
    }

    #search-form {
        height: 0;
        min-height: 0;
        transition: all 0.3s ease-in-out;
        /*display: none;*/
        overflow: hidden;
    }

    .open-modal{
        display: flex;
        min-height: max-content !important;
        height: max-content !important;
    }

</style>

<div class="row">

    <div class="col-12">
        <div class="w-100 d-flex justify-content-end my-3">
            <button type="button" class="btn btn-outline-primary search-btn d-flex" id="search-btn" style="gap: 8px">
                <span>بحث</span>
                <span class="svg-icon svg-icon-2">
                            <svg
                                fill="#007bff"
                                height="14px"
                                width="14px"
                                version="1.1"
                                id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 330 330"
                                xml:space="preserve"

                            >
                              <path
                                  id="XMLID_225_"
                                  d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393
	c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393
	s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"
                              />
                            </svg>
                          </span>
            </button>
        </div>


        <div class="card" id="search-form">
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <label for="tb-fname">رقم المستند</label>
                                <input type="text" name="id" value="{{@request()->id}}" class="form-control" id="tb-fname" placeholder="رقم المستند">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <label for="tb-fname">تاريخ الدفع</label>
                                <input class="form-control form-control-solid w-100 mw-250px" placeholder="Pick date range" id="kt_ecommerce_report_returns_daterangepicker" />

                                <input id="start_date" type="hidden" name="start_date" value="{{@request()->start_date}}" />
                                <input id="end_date" type="hidden" name="end_date" value="{{@request()->end_date}}"/>
                            </div>
                        </div>



                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <label for="tb-fname">اسم الشركة </label>
                                <input type="text" name="company_id" value="{{@request()->company_id}}" class="form-control" id="tb-fname" placeholder="اسم الشركة ">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <label for="tb-fname">نوع المعاملة</label>
                                <select id="transaction"  name="transaction" class="form-control form-select select22">
                                    <option value="" selected>نوع المعاملة</option>
                                    <option value="1" @if(request()->transaction == 1) selected @endif>مصروف</option>
                                    <option value="2" @if(request()->transaction == 2) selected @endif>ايراد</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-md-flex align-items-center mt-3">

                                <div class="ms-auto mt-3 mt-md-0">
                                    <button type="submit" class="btn btn-primary text-white px-3">بحث</button>
                                    <a href="{{route('report-cash')}}">
                                        <button type="button" class="btn btn-danger text-white px-3">إغلاق</button>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>
    const searchBtn = document.getElementById("search-btn");
    const searchModal = document.getElementById("search-form")

    searchBtn.onclick = function () {
        searchModal.classList.toggle("open-modal")
    }
</script>
