<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Listing Form</title>

  <!-- Bootstrap 5 CDN -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />

  <style>
    body {
      background: linear-gradient(135deg, #f8f9fa, #e9f2ff);
      min-height: 100vh;
    }

    .form-card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      overflow: hidden;
    }

    .form-card .card-header {
      background: linear-gradient(135deg, #0d6efd, #3d8bfd);
      color: white;
      padding: 1.25rem 1.5rem;
      border-bottom: none;
    }

    .form-card .card-header h2 {
      margin: 0;
      font-size: 1.5rem;
      font-weight: 700;
    }

    .form-label {
      font-weight: 600;
      color: #495057;
    }

    .form-control,
    .form-select {
      border-radius: 0.75rem;
      padding: 0.75rem 0.9rem;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: #86b7fe;
      box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }

    .btn {
      border-radius: 0.75rem;
      padding: 0.7rem 1.25rem;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9">
        <div class="card form-card">
          <div class="card-header">
            <h2>Listing Information Form</h2>
          </div>

          <div class="card-body p-4 p-md-5">
            <form action="search_proc.php" method="post">
              <div class="row g-4">
                <div class="col-md-6">
                  <label for="ListingKey" class="form-label">ListingKey</label>
                  <input type="text" class="form-control" id="ListingKey" name="ListingKey" placeholder="Enter ListingKey">
                </div>

                <div class="col-md-6">
                  <label for="ListingId" class="form-label">ListingId</label>
                  <input type="text" class="form-control" id="ListingId" name="ListingId" placeholder="Enter ListingId">
                </div>

                <div class="col-md-6">
                  <label for="StandardStatus" class="form-label">StandardStatus</label>
                  <select class="form-select" id="StandardStatus" name="StandardStatus">
                    <option value="" selected>선택하세요</option>
                    <option value="Active">Active</option>
                    <option value="Active Under Contract">Active Under Contract</option>
                    <option value="Canceled">Canceled</option>
                    <option value="Closed">Closed</option>
                    <option value="Expired">Expired</option>
                    <option value="Pending">Pending</option>
                    <option value="Withdrawn">Withdrawn</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="MlsStatus" class="form-label">MlsStatus</label>
                  <input type="text" class="form-control" id="MlsStatus" name="MlsStatus" placeholder="Enter MlsStatus">
                </div>

                <div class="col-md-6">
                  <label for="PropertyType" class="form-label">PropertyType</label>
                  <select class="form-select" id="PropertyType" name="PropertyType">
                    <option value="" selected>선택하세요</option>
                    <option value="Residential">Residential</option>
                    <option value="Lease">Lease</option>
                    <option value="Income">Income</option>
                    <option value="Land">Land</option>
                    <option value="Mobile">Mobile</option>
                    <option value="Commercial Sale">Commercial Sale</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="StreetNumber" class="form-label">StreetNumber</label>
                  <input type="text" class="form-control" id="StreetNumber" name="StreetNumber" placeholder="Enter StreetNumber">
                </div>

                <div class="col-md-6">
                  <label for="StreetName" class="form-label">StreetName</label>
                  <input type="text" class="form-control" id="StreetName" name="StreetName" placeholder="Enter StreetName">
                </div>

                <div class="col-md-6">
                  <label for="StreetSuffix" class="form-label">StreetSuffix</label>
                  <input type="text" class="form-control" id="StreetSuffix" name="StreetSuffix" placeholder="Enter StreetSuffix">
                </div>

                <div class="col-12">
                  <label for="UnparsedAddress" class="form-label">CoListOfficeMlsId</label>
                  <input type="text" class="form-control" id="CoListOfficeMlsId" name="CoListOfficeMlsId" placeholder="Enter CoListOfficeMlsId">
                </div>

                <div class="col-md-6">
                  <label for="City" class="form-label">City</label>
                  <input type="text" class="form-control" id="City" name="City" placeholder="Enter City">
                </div>

                <div class="col-md-6">
                  <label for="StateOrProvince" class="form-label">StateOrProvince</label>
                  <input type="text" class="form-control" id="StateOrProvince" name="StateOrProvince" placeholder="Enter StateOrProvince">
                </div>

                <div class="col-md-6">
                  <label for="PostalCode" class="form-label">PostalCode</label>
                  <input type="text" class="form-control" id="PostalCode" name="PostalCode" placeholder="Enter PostalCode">
                </div>

                <div class="col-md-6">
                  <label for="CountyOrParish" class="form-label">CountyOrParish</label>
                  <input type="text" class="form-control" id="CountyOrParish" name="CountyOrParish" placeholder="Enter CountyOrParish">
                </div>
                <div class="col-md-6">
                  <label for="CountyOrParish" class="form-label">ListAgentMlsId</label>
                  <input type="text" class="form-control" id="ListAgentMlsId" name="ListAgentMlsId" placeholder="Enter ListAgentMlsId">
                </div>
                <div class="col-md-6">
                  <label for="CountyOrParish" class="form-label">ListOfficeMlsId</label>
                  <input type="text" class="form-control" id="ListOfficeMlsId" name="ListOfficeMlsId" placeholder="Enter ListOfficeMlsId">
                </div>
              </div>

              <div class="d-flex justify-content-end gap-2 mt-4">
                <button type="reset" class="btn btn-outline-secondary">초기화</button>
                <button type="submit" class="btn btn-primary">검색</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
