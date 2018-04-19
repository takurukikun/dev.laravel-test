    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand {{ (current_page('')) ? 'active' : '' }}" href="{{url('/')}}">Home</a>
        </div>
    
        <div class="collapse navbar-collapse" id="navbar-collapse-3">
          <ul class="nav navbar-nav">
            <li class="{{ (current_page('generator')) ? 'active' : '' }}">
            	<a href="{{url('/generator')}}">Gerador de Números</a></li>
            <li class="{{ (current_page('simplifier')) ? 'active' : '' }}">
            	<a href="{{url('/simplifier')}}">Simplificador de Expressões</a></li>
            
            <!--<li>
              <a class="btn btn-default btn-outline btn-circle"  data-toggle="collapse" href="#nav-collapse3" aria-expanded="false" aria-controls="nav-collapse3">Search</a>
            </li>!-->

          </ul>
          <!--<div class="collapse nav navbar-nav nav-collapse" id="nav-collapse3">
            <form class="navbar-form navbar-right" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" />
              </div>
              <button type="submit" class="btn btn-danger"><i class="fas fa-search" aria-hidden="true"></i></button>
            </form>
          </div>!-->
        </div>
      </div>
    </nav>