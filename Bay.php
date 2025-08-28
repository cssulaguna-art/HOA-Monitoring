<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hoa_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $phone = $_POST['phone'];
        $block_lot = $_POST['block_lot'];
        $phase = $_POST['phase'];
        $location = $_POST['location'];
        $date_registration = $_POST['date_registration'];
        $date_expiration = $_POST['date_expiration'];
        $status = $_POST['status'];
        
        $stmt = $conn->prepare("INSERT INTO bay (name, designation, phone, block_lot, phase, location, date_registration, date_expiration, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $name, $designation, $phone, $block_lot, $phase, $location, $date_registration, $date_expiration, $status);
        $stmt->execute();
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $phone = $_POST['phone'];
        $block_lot = $_POST['block_lot'];
        $phase = $_POST['phase'];
        $location = $_POST['location'];
        $date_registration = $_POST['date_registration'];
        $date_expiration = $_POST['date_expiration'];
        $status = $_POST['status'];
        
        $stmt = $conn->prepare("UPDATE bay SET name=?, designation=?, phone=?, block_lot=?, phase=?, location=?, date_registration=?, date_expiration=?, status=? WHERE id=?");
$stmt->bind_param("sssssssssi", $name, $designation, $phone, $block_lot, $phase, $location, $date_registration, $date_expiration, $status, $id);
        $stmt->execute();
    } elseif (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM bay WHERE id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: bay.php?deleted=1");
        exit();
    } else {
        die("Delete failed: " . $stmt->error);
    }
}
    $stmt->close();
    header("Location: bay.php?success=1");
    exit();
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS bay (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    block_lot VARCHAR(20) NOT NULL,
    phase VARCHAR(20) NOT NULL,
    location VARCHAR(50) NOT NULL,
    date_registration DATE NOT NULL,
    date_expiration DATE NOT NULL,
    status VARCHAR(10) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($sql);

// Fetch all records
$result = $conn->query("SELECT * FROM bay ORDER BY date_expiration ASC");

$current_date = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOA Management System</title>
    <!-- Add these in your <head> section, before </head> if not already present -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
 <link href="../HOA/image/nha.png" rel="icon">
        <link href="../HOA/image/nha.png" rel="icon">

    <script src="https://cdn.tailwindcss.com"></script>
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .overdue {
            background-color: #ffdddd !important;
            color: #ff0000 !important;
            font-weight: bold;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        @media (max-width: 768px) {
            .responsive-table th, .responsive-table td {
                padding: 8px 5px;
                font-size: 14px;
            }
        }
        @keyframes fade-in-down {
    0% { opacity: 0; transform: translateY(-30px);}
    100% { opacity: 1; transform: translateY(0);}
}
@keyframes fade-in-up {
    0% { opacity: 0; transform: translateY(30px);}
    100% { opacity: 1; transform: translateY(0);}
}
@keyframes fade-in-left {
    0% { opacity: 0; transform: translateX(30px);}
    100% { opacity: 1; transform: translateX(0);}
}
.animate-fade-in-down { animation: fade-in-down 0.8s ease; }
.animate-fade-in-up { animation: fade-in-up 1s ease; }
.animate-fade-in-left { animation: fade-in-left 1s ease; }
    </style>
</head>
<body class="bg-gray-100">
    
  <div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <div class="mb-6 md:mb-0 flex-1">
            <h1 class="text-4xl font-extrabold text-gray-800 flex items-center gap-3 animate-fade-in-down">
                <svg class="w-10 h-10 text-blue-600 animate-bounce" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0h-6a2 2 0 01-2-2v-6a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2z"/>
                </svg>
                CSSU LAGUNA HOA MONITORING SYSTEM
            </h1>
            <div class="flex justify-center md:justify-start mt-2">
                <p class="text-gray-600 text-lg font-medium tracking-wide bg-gradient-to-r from-blue-100 via-white to-green-100 rounded px-6 py-3 shadow-lg border border-blue-200 animate-fade-in-up">
                    <span class="font-bold text-blue-700 tracking-widest">CSSU LAGUNA DISTRICT OFFICE</span>
                </p>
            </div>
        </div>
        <div class="flex items-center space-x-4 animate-fade-in-left">
            <img src="../HOA/image/nha.png" alt="HOA Logo" class="rounded-full w-16 h-16 border-4 border-blue-200 shadow-lg transition-transform duration-300 hover:scale-110">
            <button onclick="openModal('create')" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl flex items-center font-semibold shadow-lg transition-all duration-300 hover:scale-105">
                <i class="fas fa-plus mr-2"></i> Add Homeowner
            </button>
            <button onclick="document.getElementById('excelUpload').click()" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl flex items-center font-semibold shadow-lg transition-all duration-300 hover:scale-105">
                <i class="fas fa-file-excel mr-2"></i> Upload Excel
            </button>
            <form id="excelForm" method="post" action="upload_excel.php" enctype="multipart/form-data" class="hidden">
                <input type="file" id="excelUpload" name="excel_file" accept=".xls,.xlsx" onchange="document.getElementById('excelForm').submit()">
            </form>
        </div>
    </div>
</div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6 card">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Members</h3>
                <div class="flex items-center">
                    <div class="bg-blue-100 p-3 rounded-full mr-4">
                        <i class="fas fa-users text-blue-600"></i>
                    </div>
                    <p class="text-2xl font-bold"><?php echo $result->num_rows; ?></p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 card">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Active Members</h3>
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-full mr-4">
                        <i class="fas fa-check-circle text-green-600"></i>
                    </div>
                    <p class="text-2xl font-bold">
                        <?php 
                            $active = $conn->query("SELECT COUNT(*) FROM bay WHERE status='Active' AND date_expiration >= '$current_date'")->fetch_row()[0];
                            echo $active;
                        ?>
                    </p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 card">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Expired Members</h3>
                <div class="flex items-center">
                    <div class="bg-red-100 p-3 rounded-full mr-4">
                        <i class="fas fa-exclamation-circle text-red-600"></i>
                    </div>
                    <p class="text-2xl font-bold">
                        <?php 
                            $expired = $conn->query("SELECT COUNT(*) FROM bay WHERE status='Inactive' OR date_expiration < '$current_date'")->fetch_row()[0];
                            echo $expired;
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden mb-8">
            <div class="p-4 border-b">
                <h2 class="text-xl font-semibold text-gray-800">Homeowner Directory</h2>
            </div>
            <div class="overflow-x-auto mb-8">
                <table id="hoaTable" class="responsive-table">
    
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Designation</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Block & Lot</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phase</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Site</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Registered</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expiration Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php 
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $isOverdue = ($row['date_expiration'] < $current_date) || ($row['status'] == 'Inactive');
                        ?>
                        <tr class="<?php echo $isOverdue ? 'overdue' : ''; ?>">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo ucwords(strtoupper($row['id'])); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo ucwords(strtoupper($row['name'])); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo ucwords(strtoupper($row['designation'])); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $row['phone']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo ucwords(strtoupper($row['block_lot'])); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $row['phase']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $row['location']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo ucwords(strtoupper(date('M d, Y', strtotime($row['date_registration'])))); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo ucwords(strtoupper(date('M d, Y', strtotime($row['date_expiration'])))); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo ($row['status'] == 'Active' && !$isOverdue) ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                                    <?php echo $isOverdue ? 'Inactive' : $row['status']; ?>
                                </span>
                            </td>
                           <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button onclick="openModal('edit', <?php echo $row['id']; ?>)" 
                                    class="bg-blue-600 hover:bg-blue-700 text-white  py-2 rounded-lg flex items-center justify-center w-full">
                                    <i class="fas fa-edit mr-2"></i> Update
                                </button>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else {
                        ?>
                        <tr>
                            <td colspan="9" class="px-6 py-4 text-center text-sm text-gray-500">No homeowners registered yet.</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- Modal -->
<div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl p-6 mx-4">
        <div class="flex justify-between items-center mb-4">
            <h3 id="modalTitle" class="text-xl font-semibold text-gray-800"></h3>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="homeownerForm" method="post" action="">
            <input type="hidden" id="id" name="id">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" style="text-transform:uppercase;" required>
                </div>
                <div>
                    <label for="designation" class="block text-sm font-medium text-gray-700 mb-1">Designation</label>
                    <input type="text" id="designation" name="designation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" style="text-transform:uppercase;" required>
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label for="block_lot" class="block text-sm font-medium text-gray-700 mb-1">Block & Lot</label>
                    <input type="text" id="block_lot" name="block_lot" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" style="text-transform:uppercase;" required>
                </div>
                <div>
                    <label for="phase" class="block text-sm font-medium text-gray-700 mb-1">Phase</label>
                    <select id="phase" name="phase" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Select Phase</option>
                        <option value="1">Phase 1</option>
                        <option value="2">Phase 2</option>
                        <option value="3">Phase 3</option>
                        <option value="4">Phase 4</option>
                        <option value="5">Phase 5</option>
                        <option value="6">Phase 6</option>
                        <option value="7">Phase 7</option>
                        <option value="8">Phase 8</option>
                        <option value="9">Phase 9</option>
                        <option value="10">Phase 10</option>
                        <option value="11">Phase 11</option>
                        <option value="12">Phase 12</option>
                        <option value="13">Phase 13</option>
                        <option value="14">Phase 14</option>
                        <option value="SITE 1">SITE 1</option>
                        <option value="SITE 2">SITE 2</option>
                        <option value="SITE 3">SITE 3</option>
                    </select>
                </div>
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                    <select id="location" name="location" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Select Location</option>
                        <option value="SAN PEDRO">SAN PEDRO</option>
                        <option value="BIÑAN">BIÑAN</option>
                        <option value="STA ROSA">STA ROSA</option>
                        <option value="CABUYAO">CABUYAO</option>
                        <option value="CALAMBA">CALAMBA</option>
                        <option value="BAY">BAY</option>
                        <option value="CALAUAN">CALAUAN</option>
                        <option value="SAN PABLO">SAN PABLO</option>
                    </select>
                </div>
                <div>
                    <label for="date_registration" class="block text-sm font-medium text-gray-700 mb-1">Date Registered</label>
                    <input type="date" id="date_registration" name="date_registration" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label for="date_expiration" class="block text-sm font-medium text-gray-700 mb-1">Expiration Date</label>
                    <input type="date" id="date_expiration" name="date_expiration" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</button>
                <button type="submit" id="submitBtn" name="create" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</div>

    <script>
        function openModal(action, id = null) {
            const modal = document.getElementById('modal');
            const form = document.getElementById('homeownerForm');
            const modalTitle = document.getElementById('modalTitle');
            
            if (action === 'create') {
                modalTitle.textContent = 'Add New Homeowner';
                form.reset();
                form.action = '';
                document.getElementById('submitBtn').name = 'create';
                document.getElementById('id').value = '';
                document.getElementById('status').value = 'Active';
            } else if (action === 'edit' && id) {
                modalTitle.textContent = 'Update HOA Information';
                document.getElementById('submitBtn').name = 'update';
                
                // Fetch homeowner data
                fetch(`baydb.php?id=${id}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('id').value = data.id;
                        document.getElementById('name').value = data.name;
                        document.getElementById('designation').value = data.designation;
                        document.getElementById('phone').value = data.phone;
                        document.getElementById('block_lot').value = data.block_lot;
                        document.getElementById('phase').value = data.phase;
                        document.getElementById('location').value = data.location;
                        document.getElementById('date_registration').value = data.date_registration;
                        document.getElementById('date_expiration').value = data.date_expiration;
                        document.getElementById('status').value = data.status;
                    });
            }
            
            modal.classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

       function confirmDelete(id) {
    if (confirm('Are you sure you want to delete this homeowner?')) {
        window.location.href = `?delete=${id}`;
    }
}

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('modal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
    <script>
$(document).ready(function() {
    $('#hoaTable').DataTable({
        paging: true,        // Enable pagination
        pageLength: 10,      // Show 10 rows per page
        lengthChange: true,  // Allow user to select page size
        info: true,          // Show table info
        searching: true,     // Enable search box
        responsive: true,    // Responsive table
        order: []            // No initial sort
    });
});
</script>


</body>
</html>
<?php $conn->close(); ?>
