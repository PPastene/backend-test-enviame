<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Empresa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class EmpresaTest extends TestCase
{
    use RefreshDatabase;

    public function test_modificar_empresa_exito()
    {
        $this->json('POST', 'api/v1/empresas', [
            'nombre' => 'Flanders y Asociados',
            'direccion' => 'Av. Siempre Viva 744',
            'codigo_postal' => '80085',
            'fono' => '+27113456789'
        ]);
        $empresa = $this->json('PUT', 'api/v1/empresas/1', [
            'nombre' => 'Compumundohipermegared',
            'direccion' => 'Av. Siempre Viva 744',
            'codigo_postal' => '80085',
            'fono' => '+27113456789'
        ]);
        $empresa->assertSuccessful();
    }

    public function test_modificar_empresa_fracaso_sin_id()
    {
        $empresa = $this->json('PUT', 'api/v1/empresas/', []);
        $empresa->assertStatus(405);
    }

    public function test_ruta_crear_empresa_exito()
    {
        $empresa = $this->json('POST', 'api/v1/empresas', [
            'nombre' => 'Flanders y Asociados',
            'direccion' => 'Av. Siempre Viva 744',
            'codigo_postal' => '80085',
            'fono' => '+27113456789'
        ]);
        $empresa->assertSuccessful();
    }

    public function test_ruta_crear_empresa_fracaso_sin_datos()
    {
        $empresa = $this->json('POST', 'api/v1/empresas', []);
        $empresa->assertStatus(400);
    }

    public function test_traer_empresas()
    {
        $empresas = Empresa::factory()->count(10)->create();
        $this->assertDatabaseCount('empresas', 10);
    }

    public function test_borrar_empresa()
    {
        $empresa = Empresa::factory()->make();
        $empresa->delete();
        $this->assertDeleted($empresa);
    }
}
