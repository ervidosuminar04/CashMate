<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Keuangan</title>
    <style>
        body { font-family: sans-serif; color: #333; line-height: 1.5; font-size: 14px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #22c55e; padding-bottom: 10px; }
        .header h1 { margin: 0; color: #166534; }
        .header p { margin: 5px 0 0; color: #666; }
        .section-title { font-size: 18px; color: #166534; border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 30px; margin-bottom: 15px; }
        .summary-box { border: 1px solid #e5e7eb; background: #f9fafb; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        .summary-grid { display: table; width: 100%; }
        .summary-item { display: table-cell; width: 33.33%; text-align: center; }
        .summary-label { font-size: 12px; color: #6b7280; text-transform: uppercase; }
        .summary-value { font-size: 18px; font-weight: bold; margin-top: 5px; }
        .text-success { color: #16a34a; }
        .text-danger { color: #dc2626; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #e5e7eb; padding: 8px 12px; text-align: left; }
        th { background: #f3f4f6; font-weight: bold; }
        .text-right { text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $business->name ?? 'Usaha Saya' }}</h1>
        <p>Laporan Keuangan Periode: {{ $startDate->format('d M Y') }} - {{ $endDate->format('d M Y') }}</p>
    </div>

    <div class="section-title">Ringkasan Laba Rugi</div>
    
    <div class="summary-box">
        <div class="summary-grid">
            <div class="summary-item">
                <div class="summary-label">Total Pemasukan</div>
                <div class="summary-value text-success">Rp {{ number_format($profitLossData['total_income'], 0, ',', '.') }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Total Pengeluaran</div>
                <div class="summary-value text-danger">Rp {{ number_format($profitLossData['total_expense'], 0, ',', '.') }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Laba Bersih</div>
                <div class="summary-value {{ $profitLossData['net_profit'] >= 0 ? 'text-success' : 'text-danger' }}">
                    Rp {{ number_format($profitLossData['net_profit'], 0, ',', '.') }}
                </div>
            </div>
        </div>
    </div>

    <div class="section-title">Rincian Pengeluaran per Kategori</div>
    
    @if(count($categoryBreakdown) > 0)
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th class="text-right">Total Pengeluaran</th>
                    <th class="text-right">Persentase</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categoryBreakdown as $index => $category)
                    @php
                        $percentage = $profitLossData['total_expense'] > 0 
                            ? ($category->total / $profitLossData['total_expense']) * 100 
                            : 0;
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="text-right">Rp {{ number_format($category->total, 0, ',', '.') }}</td>
                        <td class="text-right">{{ number_format($percentage, 1) }}%</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" class="text-right">Total Keseluruhan</th>
                    <th class="text-right">Rp {{ number_format($profitLossData['total_expense'], 0, ',', '.') }}</th>
                    <th class="text-right">100%</th>
                </tr>
            </tfoot>
        </table>
    @else
        <p>Tidak ada data pengeluaran pada periode ini.</p>
    @endif
    
    <div style="margin-top: 50px; text-align: right; font-size: 12px; color: #999;">
        Dicetak pada: {{ now()->format('d M Y H:i:s') }} oleh aplikasi CashMate
    </div>
</body>
</html>
