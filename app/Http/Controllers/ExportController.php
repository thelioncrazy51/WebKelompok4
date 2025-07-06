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
        
        $fileName = 'users_' . date('Y-m-d') . '.xls';
        
        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $content = $this->generateExcelContent($users);
        
        return response()->make($content, 200, $headers);
    }

    private function generateExcelContent($users)
    {
        // Header Excel XML
        $content = '<?xml version="1.0"?>
        <Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
        xmlns:o="urn:schemas-microsoft-com:office:office"
        xmlns:x="urn:schemas-microsoft-com:office:excel"
        xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
        xmlns:html="http://www.w3.org/TR/REC-html40">
        <Worksheet ss:Name="Users">
        <Table>
        <Row>
            <Cell><Data ss:Type="String">ID</Data></Cell>
            <Cell><Data ss:Type="String">Nama</Data></Cell>
            <Cell><Data ss:Type="String">Email</Data></Cell>
            <Cell><Data ss:Type="String">Role</Data></Cell>
        </Row>';

        // Data rows
        foreach ($users as $user) {
            $content .= '
            <Row>
                <Cell><Data ss:Type="Number">' . $user->id . '</Data></Cell>
                <Cell><Data ss:Type="String">' . $this->escapeExcelXml($user->name) . '</Data></Cell>
                <Cell><Data ss:Type="String">' . $this->escapeExcelXml($user->email) . '</Data></Cell>
                <Cell><Data ss:Type="String">' . $this->escapeExcelXml($user->role) . '</Data></Cell>
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