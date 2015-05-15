@layout('home')
@section('content')

      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/home">NIELIT, Aizawl: SDMS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/signin">Login</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Student Search...">
            <select class="form-control">
                <option selected="selected" value="">All Academic Session</option>
                <option value="">2015-2016</option>
                <option value="">2001-2002</option>>
                <option value="">2002-2003</option>>
                <option value="">2003-2004</option>>
                <option value="">2004-2005</option>>
                <option value="">2005-2006</option>>
                <option value="">2006-2007</option>>
                <option value="">2007-2008</option>>
                <option value="">2008-2009</option>>
                <option value="">2009-2010</option>>
                <option value="">2010-2011</option>>
                <option value="">2011-2012</option>>
                <option value="">2012-2013</option>>
                <option value="">2013-2014</option>>
                <option value="">2014-2015</option>>
            </select>
            <select class="form-control">
                <option selected="selected" value="">All Course</option>
                <option value="">MCA</option>
                <option value="">BCA</option>
                <option value="">DETE</option>
                <option value="">DCSE</option>
                <option value="">MAT-O</option>
                <option value="">O-LEVEL</option>
                <option value="">A-LEVEL</option>
                <option value="">CCC</option>
                <option value="">Short-Term</option>
            </select>
          </form>
        </div>
      </div>
  @endsection
@section('content1')
    
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Welcome to Student Record Database Management</h3>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <div class="chart">
                <div class="pie-thychart" data-set='[["Male", 40], ["Female",60]]' data-colors="#6699FF,#CC99FF"></div>
              </div>
              <h4>Sex</h4>
              <span class="text-muted">% of Male & Female</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <div class="chart">
                <div class="pie-thychart" data-set='[["ST", 20], ["SC",30],["OBC",40],["GEN",10]]' data-colors="#6699FF,#CC99FF,#FF9966,#47B224"></div>
              </div>
              <h4>Categories</h4>
              <span class="text-muted">ST/SC/GEN/OBC</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <div class="chart">
                <div class="pie-thychart" data-set='[["MCA", 20], ["BCA",30],["DETE",40],["DCSE",10],["O Level",10],["MAT-O",10],["A Level",10],["CCC",10],["Short-Term",10]]' data-colors="#6699FF,#CC99FF,#FF9966,#47B224,#9933FF,#CC6699,#669999,#000066,#666633"></div>
              </div>
              <h4>Courses</h4>
              <span class="text-muted">Short and Long Term Courses</span>
            </div>
          </div>

          <h2 class="sub-header">YEARLY STUDENT RECORD</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th><button type="button" class="btn btn-primary" data-toggle="popover" title="MCA" data-content="Master of Computer Applications : 3yrs Affiliated by MZU">MCA</button></th>
                  <th>BCA</th>
                  <th>DETE</th>
                  <th>DCSE</th>
                  <th>MAT-O</th>
                  <th>O-Level</th>
                  <th>A-Level</th>
                  <th>CCC</th>
                  <th>Short Term</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2001-2002</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2002-2003</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2003-2004</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2004-2005</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2005-2006</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2006-2007</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2007-2008</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2008-2009</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2009-2010</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2010-2011</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2011-2012</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2012-2013</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2013-2014</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2014-2015</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>TOTAL</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
               </tbody>
            </table>
          </div>
        </div>
      </div>
  
@endsection
