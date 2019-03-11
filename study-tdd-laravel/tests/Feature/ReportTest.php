<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportTest extends TestCase
{
    /**
     * @test
     */
    public function api_customersにGETメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->get('api/customers');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_customersにPOSTメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->post('api/customers');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_customers_customer_idにGETメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->get('api/customers/1');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_customers_customer_idにPUTメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->put('api/customers/1');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_customers_customer_idにdeleteメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->delete('api/customers/1');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_reportsにGETメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->get('api/reports');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_reportsにPOSTメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->post('api/reports');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_reports_report_idにGETメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->get('api/reports/1');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_reports_report_idにPUTメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->put('api/reports/1');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_reports_report_idにDELETEメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->delete('api/reports/1');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }
}
