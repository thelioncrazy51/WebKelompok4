<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function exportUsers()
    {
        $users = User::select('id', 'name', 'email', 'role')->get();
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Set header
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Role');
        
        // Style untuk header
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4CAF50']
            ]
        ];
        
        $sheet->getStyle('A1:D1')->applyFromArray($headerStyle);
        
        // Isi data
        $row = 2;
        foreach ($users as $user) {
            $sheet->setCellValue('A'.$row, $user->id);
            $sheet->setCellValue('B'.$row, $user->name);
            $sheet->setCellValue('C'.$row, $user->email);
            $sheet->setCellValue('D'.$row, ucfirst($user->role));
            $row++;
        }
        
        // Auto size kolom
        foreach(range('A','D') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
        
        $writer = new Xlsx($spreadsheet);
        
        $response = new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );
        
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="users.xlsx"');
        $response->headers->set('Cache-Control', 'max-age=0');
        
        return $response;
    }
}