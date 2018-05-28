<section class="content">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Nuevo cliente
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                  <a href="./?view=index"><i class="fa fa-dashboard"></i> Escritorio</a>
                            </li>
                            <li>
                                  <a href="./?view=client"><i class="fa fa-users"></i> clientes</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-asterisk"></i> Nuevo cliente
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-8">

                        <form role="form" method="post" action="./?action=addclient" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label>Imagen (480x480)</label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" required class="form-control" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" name="apellido" required class="form-control" placeholder="Apellidos">
                            </div>
                            <div class="form-group">
                                <label>Domicilio</label>
                                <input type="text" name="domicilio"  class="form-control" placeholder="Domicilio">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email"  class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="text" name="telf"  class="form-control" placeholder="Telefono">
                            </div>
                            <div class="form-group">
                                <label>DNI/C.E.</label>
                                <input type="text" name="dni" class="form-control" required placeholder="DNI/C.E.">
                            </div>
                            <div class="form-group">
                                <label>Fecha de Nacimiento</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" name="nac" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Sexo</label>
                                <select name="sexo" class="form-control">
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Disciplina*</label>
                                <select name="disciplina" class="form-control">
                                    <option value="Funcional">Funcional</option>
                                    <option value="Aerobico">Aerobico</option>
                                    <option value="Fusion">Plan Completo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Membresia</label>
                                <input type="text" name="membresia"  class="form-control" placeholder="Membresia">
                                <!-- <select name="membresia" class="form-control">
                                    <option value="Funcional">2x1</option>
                                    <option value="Aerobico">Normal</option>
                                </select> -->
                            </div>
                            <div class="form-group">
                                <label>Fecha Inicio*</label>
                                    <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" name="fecha_inicio" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                </div>
                                <label>Fecha Expiracion*</label>
                                    <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" name="fecha_fin" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date range:</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" id="reservation">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Boton para Fecha</label>
                                <div class="input-group">
                                  <button type="button" class="btn btn-default pull-left" id="daterange-btn">
                                    <span>
                                      <i class="fa fa-calendar"></i> Fechas Por Rango
                                    </span>
                                    <i class="fa fa-caret-down"></i>
                                  </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Pago*</label>
                                <input type="text" name="pago" id="pago" class="form-control" onkeyup="operar('restar');" placeholder="Pago">
                                <label>Total a pagar*</label>
                                <input type="text" name="monto" id="monto" class="form-control" onkeyup="operar('restar');" placeholder="Monto">
                                <label>Deuda*</label>
                                <input type="text" id="total" name="deuda" class="form-control" readonly placeholder="Deuda">
                            </div>
                            <div class="form-group">
                                <label>Forma de pago*</label>
                                <select name="forma_pago" class="form-control">
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Tarjeta de Cedrito">Tarjeta de Cedrito</option>
                                    <option value="Tarjeta de Debido">Tarjeta de Debido</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Atendido Por:</label>
                                <input type="text" readonly value="admin" name="atendido" required class="form-control" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label>Nota</label>
                                <textarea name="nota"  class="form-control" placeholder="Nota"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-lg-3">


                    </div>
                </div>
                <!-- /.row -->
<br><br><br><br><br>
</section>