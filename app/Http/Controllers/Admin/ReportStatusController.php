<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportStatusRequest;
use App\Http\Requests\UpdateReportStatusRequest;
use App\Interfaces\ReportRepositoryInterface;
use App\Interfaces\ReportStatusRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class ReportStatusController extends Controller
{
    private ReportRepositoryInterface $reportRepository;
    private ReportStatusRepositoryInterface $reportStatusRepository;

    public function __construct(
        ReportStatusRepositoryInterface $reportStatusRepository,
        ReportRepositoryInterface $reportRepository,
    ) {
        $this->reportRepository = $reportRepository;
        $this->reportStatusRepository = $reportStatusRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($reportId)
    {
        $report = $this->reportRepository->getReportById($reportId);

        return view('pages.admin.report-status.create', compact('report'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportStatusRequest $request)
    {
        $data = $request->validated();

        if ($request->image) {
            $data['image'] = $request->file('image')->store('assets/report-status/image', 'public');
        }

        $this->reportStatusRepository->createReportStatus($data);

        swal::toast('Data Progress laporan Berhasil Ditambahkan', 'success')->timerProgressBar();

        return redirect()->route('admin.report.show', $request->report_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $status = $this->reportStatusRepository->getReportStatusById($id);

        return view('pages.admin.report-status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportStatusRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->image) {
            $data['image'] = $request->file('image')->store('assets/report-status/image', 'public');
        }

        $this->reportStatusRepository->updateReportStatus($data, $id);

        swal::toast('Data Progress Laporan Berhasil Di Update', 'success')->timerProgressBar();

        return redirect()->route('admin.report.show', $request->report_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = $this->reportStatusRepository->getReportStatusById($id);

        $this->reportStatusRepository->deleteReportStatus($id);

        swal::toast('Data Progress Laporan Berhasil Dihapus', 'success')->timerProgressBar();

        return redirect()->route('admin.report.show', $status->report_id);
    }
}
