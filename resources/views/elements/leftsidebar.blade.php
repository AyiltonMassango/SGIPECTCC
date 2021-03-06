<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('images/backend/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">School</div>
            {{--<div class="email">escolaconducao@co.mz</div>--}}
            <div class="btn-group user-helper-dropdown justify-content-end">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out
                        </a>
                    </li>
                </ul>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">Menú</li>
            <li id="li_home" class="active">
                <a href="{{url('/home')}}">
                    <i class="material-icons">home</i>
                    <span>Página Principal</span>
                </a>
            </li>

            <li id="li_ecola">
                <a id="a_escola" href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">account_balance</i>
                    <span>Escolas</span>
                </a>
                <ul class="ml-menu">
                    <li id="a_add_escola">
                        <a  href="{{url('/escola/create')}}">
                            <i class="material-icons">add</i>
                            <span>Cadastrar</span>
                        </a>
                    </li>
                    <li id="a_list_escola">
                        <a href="{{url('')}}">
                            <i class="material-icons">list</i>
                            <span>Listar</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li id="li_funcionario">
                <a id="a_funcionario" href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">person</i>
                    <span>Funcionários</span>
                </a>
                <ul class="ml-menu">
                    <li id="a_add_funcionario">
                        <a id="" href="{{url('funcionario/create')}}">
                            <i class="material-icons">person_add</i>
                            <span>Cadastrar</span>
                        </a>
                    </li>
                    <li>
                        <a id="a_list_funcinari" href="{{url('funcionario')}}">
                            <i class="material-icons">list</i>
                            <span>Listar</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li id="li_categoria">
                <a href="{{url('/categoriacarta')}}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <span>Categoria das Cartas</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
           <strong> SGIPECTCC &copy; 2018</strong>
        </div>
        {{--<div class="version">--}}
            {{--<b>Versão: </b> 1.0.0--}}
        {{--</div>--}}
    </div>
    <!-- #Footer -->
</aside>
