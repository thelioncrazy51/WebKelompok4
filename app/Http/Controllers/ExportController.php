<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class ExportController extends Controller
{
    public function exportUsers()
    {
        $users = User::select('id', 'name', 'email', 'role')->get();
        
        $fileName = 'Data-User-SmartFarming_' . date('Y-m-d') . '.xls';
        
        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $content = $this->generateExcelContent($users);
        
        return response()->make($content, 200, $headers);
    }

    private function generateExcelContent($users)
    {
        // Header Excel XML dengan styling
        $content = '<?xml version="1.0"?>
        <Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
        xmlns:o="urn:schemas-microsoft-com:office:office"
        xmlns:x="urn:schemas-microsoft-com:office:excel"
        xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
        xmlns:html="http://www.w3.org/TR/REC-html40">
        
        <!-- Define Styles -->
        <Styles>
            <Style ss:ID="Header">
                <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
                <Font ss:Bold="1" ss:Color="#FFFFFF"/>
                <Interior ss:Color="#4CAF50" ss:Pattern="Solid"/>
                <Borders>
                    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#000000"/>
                    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#000000"/>
                    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#000000"/>
                    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#000000"/>
                </Borders>
            </Style>
            <Style ss:ID="Center">
                <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
                <Borders>
                    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#000000"/>
                    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#000000"/>
                    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#000000"/>
                    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#000000"/>
                </Borders>
            </Style>
            <Style ss:ID="Left">
                <Alignment ss:Horizontal="Left" ss:Vertical="Center"/>
                <Borders>
                    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#000000"/>
                    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#000000"/>
                    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#000000"/>
                    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#000000"/>
                </Borders>
            </Style>
        </Styles>
        
        <Worksheet ss:Name="Users">
        <Table>
            <!-- Column Widths -->
            <Column ss:Width="5"/>   <!-- ID -->
            <Column ss:Width="30"/>  <!-- Nama -->
            <Column ss:Width="30"/>  <!-- Email -->
            <Column ss:Width="15"/>  <!-- Role -->';

        // Hanya tambahkan header jika ada data
        if ($users->count() > 0) {
            $content .= '
            <!-- Header Row -->
            <Row ss:Height="20" ss:StyleID="Header">
                <Cell><Data ss:Type="String">ID</Data></Cell>
                <Cell><Data ss:Type="String">Nama</Data></Cell>
                <Cell><Data ss:Type="String">Email</Data></Cell>
                <Cell><Data ss:Type="String">Role</Data></Cell>
            </Row>';
        }

        // Data rows
        foreach ($users as $user) {
            $content .= '
            <Row>
                <Cell ss:StyleID="Center"><Data ss:Type="Number">' . $user->id . '</Data></Cell>
                <Cell ss:StyleID="Left"><Data ss:Type="String">' . $this->escapeExcelXml($user->name) . '</Data></Cell>
                <Cell ss:StyleID="Left"><Data ss:Type="String">' . $this->escapeExcelXml($user->email) . '</Data></Cell>
                <Cell ss:StyleID="Center"><Data ss:Type="String">' . $this->escapeExcelXml($user->role) . '</Data></Cell>
            </Row>';
        }

        $content .= '
        </Table>
        </Worksheet>
        </Workbook>';

        return $content;
    }

    private function escapeExcelXml($value)
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_XML1, 'UTF-8');
    }
}