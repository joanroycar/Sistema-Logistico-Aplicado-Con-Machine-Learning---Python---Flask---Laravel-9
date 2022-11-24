<!DOCTYPE html>
<html lang="es">

<html>

<head>
    <title>Sistema Logistico </title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/ictevisi.png')}}"/>

    <link href="{{asset('/layouts/vertical-dark-menu/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/layouts/vertical-dark-menu/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vega@5"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vega-lite@5"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vega-embed@6"></script>
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.9.3/dist/js/tabulator.js"></script>
    <script type="text/javascript" src="https://cdn.bokeh.org/bokeh/release/bokeh-2.4.2.js"></script>
    <script type="text/javascript" src="https://cdn.bokeh.org/bokeh/release/bokeh-widgets-2.4.2.min.js"></script>
    <script type="text/javascript" src="https://cdn.bokeh.org/bokeh/release/bokeh-tables-2.4.2.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/@holoviz/panel@0.13.0/dist/panel.min.js"></script>

    

    <script defer src="https://pyscript.net/alpha/pyscript.js"></script>
    <py-env>
        - numpy
        - pandas
        - matplotlib
        - seaborn
        - scikit-learn
        - scipy
        - panel==0.13.1a2
    </py-env>
</head>

<body class="layout-boxed">
    <br>

    <a href="{{url('/predicted')}}" class="btn btn-xm btn-primary"  style="float: right;">Regresar A Menú Principal</a>
     <br>
    <br>
<h1 class="text-center"> Módulo para predecir los pedidos</h1>

<br>
          <div class="row">


           <div class="col" style="display: flex;
           justify-content: center !important;">
        <div class="card">

        <div class="card-body">
            <h5 class="text-center">Subir Archivo En Formato CSV</h5>

                <div id="fileinput"></div>
                <div id="upload"></div>
                <div id="to_predict"></div>
                <div id="op"></div>

                <p id="regression-op">
                 <div id="plot"></div>   

                </div>
                </div>
            </div>
            </div>



     
    <py-script output="plot">
import matplotlib.pyplot as plt
import seaborn as sns
import pandas as pd
import asyncio
import panel as pn
from panel.io.pyodide import show
import numpy as np
from sklearn.linear_model import LinearRegression

fileInput = pn.widgets.FileInput(accept=".csv")
uploadButton = pn.widgets.Button(name="Show Prediction", button_type = 'primary')
to_predict = pn.widgets.Spinner(name="Total", value=0, step=1, start=1)

def process_file(event):
    if fileInput.value is not None:
        data = pd.read_csv(io.BytesIO(fileInput.value))
        y = data[['Tiempo']]  #change column name
        X = data[['Carga']]  #change column name
        
        # regression part
        X = X 
        y = y 
        reg = LinearRegression().fit(X, y)
        reg.score(X, y)

        print(reg.coef_)

        predicted = reg.predict(np.array(to_predict.value).reshape(1, -1))

        reg_op = Element('regression-op')
        reg_op.write(predicted)

await show(fileInput, 'fileinput')
await show(uploadButton, 'upload')
await show(to_predict, 'to_predict')
uploadButton.on_click(process_file)




    </py-script>
</body>

</html>