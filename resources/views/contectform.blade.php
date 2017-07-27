<div class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 60%">
    
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">เพิ่มผู้ติดต่อ</h2>
            </div>
            <form method="post" action="/contact" class="form-horizontal">
            {{ csrf_field() }}
              <div class="modal-body addmodalcustomer">           
                            <div class="form-group">
                                  <label class="control-label col-sm-2" for="contact">Contact Person:</label>
                              <div class="col-sm-10">                                
                                <input type="text" class="form-control" id="po_contect_person" name="po_contect_person" placeholder="ชื่อผู้ติดต่อ"> 
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Moblie:</label>
                              <div class="col-sm-10">                                
                                <input type="text" class="form-control" id="po_contect_tel" name="po_contect_tel" placeholder="เบอร์โทรผู้ติดต่อ">   
                              </div>
                            </div>
                            <div class="form-group">
                                  <label class="control-label col-sm-2" for="email">Email address:</label>   
                              <div class="col-sm-10">                                
                                <input type="email" class="form-control" id="po_contect_email" name="po_contect_email" placeholder="อีเมลล์ผู้ติดต่อ">        
                             </div>
                            </div>
                    </div>                          
                          
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Add</button> 
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </form>
            </div>
            
        </div>
</div>