<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name' =>'Empleado']);

        // Permission::create(['name' => 'Modulo Productos'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'Modulo Pedidos'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'Modulo compras'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'Modulo Categorias'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Modulo Unidad de Medida'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Modulo Proveedores'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Modulo Empleados'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Modulo Roles'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Modulo Areas'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Modulo Usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'area.index','description'=>'Ver Listado de Areas'])->syncRoles([$role1]);
        Permission::create(['name' => 'area.create','description'=>'Registrar Areas'])->syncRoles([$role1]);
        Permission::create(['name' => 'area.edit','description'=>'Editar Areas'])->syncRoles([$role1]);
        Permission::create(['name' => 'area.destroy','description'=>'ELiminar Areas'])->syncRoles([$role1]);

        Permission::create(['name' => 'category.index','description'=>'Ver Listado de Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'category.create','description'=>'Registrar Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'category.edit','description'=>'Editar Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'category.destroy','description'=>'ELiminar Categorias'])->syncRoles([$role1]);

        Permission::create(['name' => 'measure.index','description'=>'Ver Listado de Unidades de Medida'])->syncRoles([$role1]);
        Permission::create(['name' => 'measure.create','description'=>'Registrar Unidades de Medida'])->syncRoles([$role1]);
        Permission::create(['name' => 'measure.edit','description'=>'Editar Unidades de Medida'])->syncRoles([$role1]);
        Permission::create(['name' => 'measure.destroy','description'=>'ELiminar Unidades de Medida'])->syncRoles([$role1]);

        Permission::create(['name' => 'suplier.index','description'=>'Ver Listado de Proveedores'])->syncRoles([$role1]);
        Permission::create(['name' => 'suplier.create','description'=>'Registrar Proveedores'])->syncRoles([$role1]);
        Permission::create(['name' => 'suplier.edit','description'=>'Editar Proveedores'])->syncRoles([$role1]);
        Permission::create(['name' => 'suplier.destroy','description'=>'ELiminar Proveedores'])->syncRoles([$role1]);

        Permission::create(['name' => 'product.index','description'=>'Ver Listado de Productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'product.create','description'=>'Registrar Productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'product.edit','description'=>'Editar Productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'product.destroy','description'=>'ELiminar Productos'])->syncRoles([$role1]);

        Permission::create(['name' => 'users.index','description'=>'Ver Listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create','description'=>'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit','description'=>'Editar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy','description'=>'Eliminar Usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'roles.index','description'=>'Ver Listado de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create','description'=>'Crear Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit','description'=>'Editar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy','description'=>'Eliminar Roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'outdated.index','description'=>'Ver Listado de Productos Obsoletos'])->syncRoles([$role1]);
        Permission::create(['name' => 'outdated.create','description'=>'Registrar Productos Obsoletos'])->syncRoles([$role1]);
        Permission::create(['name' => 'outdated.edit','description'=>'Editar Productos Obsoletos'])->syncRoles([$role1]);
        Permission::create(['name' => 'outdated.destroy','description'=>'Eliminar Productos Obsoletos'])->syncRoles([$role1]);

        Permission::create(['name' => 'employee.index','description'=>'Ver Listado de Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'employee.create','description'=>'Registrar Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'employee.edit','description'=>'Editar Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'employee.destroy','description'=>'Eliminar Empleados'])->syncRoles([$role1]);

        Permission::create(['name' => 'orders.index','description'=>'Ver Listado de Pedidos'])->syncRoles([$role1]);
        Permission::create(['name' => 'orders.create','description'=>'Registrar Pedidos'])->syncRoles([$role1]);
        Permission::create(['name' => 'orders.show','description'=>'Ver detalle Pedidos'])->syncRoles([$role1]);

        Permission::create(['name' => 'orders.culminated','description'=>'Ver Pedidos Entregados'])->syncRoles([$role1]);
        Permission::create(['name' => 'orders.ordercompleted','description'=>'Registrar Pedidos Completos'])->syncRoles([$role1]);
        Permission::create(['name' => 'orders.orderincompleted','description'=>'Registrar Pedido Incompleto'])->syncRoles([$role1]);
        Permission::create(['name' => 'orders.ontime','description'=>'Ver Pedidos Entregados a Tiempo'])->syncRoles([$role1]);
        Permission::create(['name' => 'orders.untimely','description'=>'Ver Pedidos Entregados a Desteimpo'])->syncRoles([$role1]);
        Permission::create(['name' => 'orders.pdf','description'=>'Generar PDF de Pedido'])->syncRoles([$role1]);
        Permission::create(['name' => 'orders.reportorder','description'=>'Ver Reportes de Pedidos'])->syncRoles([$role1]);

        Permission::create(['name' => 'purchases.index','description'=>'Ver Listado de Entradas'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.create','description'=>'Registrar Entradas'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.show','description'=>'Ver detalle Entradas'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.pdf','description'=>'Generar PDF de Entrada'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.reportpurchase','description'=>'Ver Reportes de Entradas'])->syncRoles([$role1]);

        Permission::create(['name' => 'indicator.index','description'=>'Ver Indicador de COE Obsolescencia'])->syncRoles([$role1]);
        Permission::create(['name' => 'indicator.pedidosTiempo','description'=>'Indicador PET'])->syncRoles([$role1]);
        Permission::create(['name' => 'indicator.pedidosCompletos','description'=>'Indicador PPP'])->syncRoles([$role1]);
        Permission::create(['name' => 'indicator.exportAllPediCompletos','description'=>'Exportar Excel PPP'])->syncRoles([$role1]);
        Permission::create(['name' => 'indicator.exportAllPediTiempo','description'=>'Exportar Excel PET'])->syncRoles([$role1]);

        Permission::create(['name' => 'predict.index','description'=>'Visualizar Predicciones'])->syncRoles([$role1]);
        
    }
}
