<br>
  <div class="row">

<div class="col-md-6">
    <label for="employee_id ">Empleado</label>
    <select class="form-control" name="employee_id" id="employee_id" style="color: white">
        <option value="" disabled selected>Selecccione un Empleado</option>
        @foreach ($employees as $employee)
        <option value="{{$employee->id}}">{{$employee->name}}</option>
        @endforeach
    </select>
    @error('employee_id')
        <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror 
</div>


<div class="col-md-6">
    <label for="date_order_delivery">Fecha Entrega:</label>
    {!! Form::datetimelocal('date_order_delivery', null, ['class' => 'form-control ', 'style'=>'color:black; background:white'. ($errors->has('date_order_delivery') ? ' border-red-600' : '')]) !!}

    @error('date_order_delivery')
        <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror 
</div>

</div>

{{-- <div class="form-group">
  <label for="code">Código de barras</label>
  <input type="text" name="code" id="code" class="form-control" placeholder="" aria-describedby="helpId">
</div> --}}

<br>
  <div class="row">
    <div class="col-md-3">
        <label for="name" class="form-label">Tipo Producto:</label>
        {!! Form::select('category_id', $category, null, ['class' => 'form-control  block w-full','style'=>'background:#1b2e4b;width: 100%','id'=>'country', 'placeholder'=>'Seleccione  una Categoria .....']) !!}
        @error('category_id')
            <strong class="text-sm text-red-600"  style="color: red">{{$message}}</strong>
        @enderror                    
    </div>
    <div class="col-md-3">
            <label for="product_id">Producto</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
            <select class="form-control" name="product_id" id="product_id">
                <option value="" disabled selected>Selecccione un Producto</option>
                @foreach ($products as $product)
                <option value="{{$product->id}}_{{$product->stock}}_{{$product->price}}">{{$product->name}}</option>
                @endforeach
            </select>
            @error('product_id')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror 
    </div>
    <div class="col-md-3">
            <label for="">Stock actual</label>
            <input type="text" name="" id="stock" value="" class="form-control" disabled>
    </div>
    <div class="col-md-3">
        <label for="quantity">Cantidad</label>
        <input type="number" class="form-control" name="quantity" id="quantity" aria-describedby="helpId">
    </div>

    <div class="col-md-3">
        <label for="quantity">Estado del Pedido</label>
        <select class="form-control" name="statusend" id="statusend" style="color: white">
            <option value="COMPLETO">COMPLETO</option>
            <option value="INCOMPLETO">INCOMPLETO</option>
        </select>
    </div>
  </div>



<br>

<br>
<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary" style="float:right">Agregar producto</button>
</div>
<br>
<div class="form-group">
    <h4 class="card-title">Detalles de Pedido</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL DE PRODUCTOS:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_html">0.00</span> <input type="hidden" name="total" id="total_value"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
