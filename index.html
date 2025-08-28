<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --success-color: #2ec4b6;
            --warning-color: #ff9f1c;
            --danger-color: #e71d36;
            --light-bg: #ffffff;
            --dark-bg: #f8f9fa;
            --text-dark: #2d3436;
            --text-light: #636e72;
            --border-light: #e9ecef;
            --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --hover-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            --border-radius: 12px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--light-bg);
            color: var(--text-dark);
            min-height: 100vh;
            line-height: 1.6;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-light);
        }

        .header-title h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header-title p {
            color: var(--text-light);
            font-size: 1.1rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: var(--dark-bg);
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            border: 1px solid var(--border-light);
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .user-info .user-name {
            font-weight: 600;
            color: var(--text-dark);
        }

        .user-info .user-role {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .metric-card {
            background: var(--light-bg);
            padding: 1.5rem;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-light);
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
        }

        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .metric-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .metric-title {
            font-size: 0.9rem;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .metric-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            background: var(--dark-bg);
        }

        .metric-value {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .metric-trend {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .trend-up {
            color: var(--success-color);
            font-weight: 600;
        }

        .trend-down {
            color: var(--danger-color);
            font-weight: 600;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        @media (max-width: 968px) {
            .charts-grid {
                grid-template-columns: 1fr;
            }
        }

        .chart-container {
            background: var(--light-bg);
            padding: 1.5rem;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-light);
            box-shadow: var(--card-shadow);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .chart-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .chart-actions span {
            color: var(--primary-color);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .chart-content {
            height: 300px;
            background: var(--dark-bg);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border-light);
        }

        .recent-activity {
            background: var(--light-bg);
            padding: 1.5rem;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-light);
            box-shadow: var(--card-shadow);
        }

        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .activity-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .activity-actions span {
            color: var(--primary-color);
            font-weight: 500;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .activity-actions span:hover {
            color: var(--secondary-color);
        }

        .activity-table {
            width: 100%;
            border-collapse: collapse;
        }

        .activity-table th,
        .activity-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border-light);
        }

        .activity-table th {
            color: var(--text-light);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            background: var(--dark-bg);
        }

        .activity-table tr:hover {
            background: var(--dark-bg);
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-completed {
            background-color: rgba(46, 196, 182, 0.1);
            color: var(--success-color);
            border: 1px solid rgba(46, 196, 182, 0.2);
        }

        .status-pending {
            background-color: rgba(255, 159, 28, 0.1);
            color: var(--warning-color);
            border: 1px solid rgba(255, 159, 28, 0.2);
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }

            .dashboard-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .header-title h1 {
                font-size: 2rem;
            }

            .metrics-grid {
                grid-template-columns: 1fr;
            }

            .activity-table {
                display: block;
                overflow-x: auto;
            }

            .chart-content {
                height: 250px;
            }
        }

        .loading-animation {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(67, 97, 238, 0.2);
            border-top: 3px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Additional styling for better visual hierarchy */
        .metric-card:nth-child(1) .metric-icon {
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
        }

        .metric-card:nth-child(2) .metric-icon {
            background: rgba(46, 196, 182, 0.1);
            color: var(--success-color);
        }

        .metric-card:nth-child(3) .metric-icon {
            background: rgba(255, 159, 28, 0.1);
            color: var(--warning-color);
        }

        .metric-card:nth-child(4) .metric-icon {
            background: rgba(231, 29, 54, 0.1);
            color: var(--danger-color);
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <div class="header-title">
                <h1>CSSU Dashboard</h1>
                <p>Welcome back! Here's your performance overview</p>
            </div>
            <div class="user-profile">
                <img src="../HOA/image/admin.png" alt="icon" style="height: 50px;">
                <div class="user-info">
                    <div class="user-name">Hello! </div>
                    <div class="user-role" style="text-align: center;">Admin</div>
                </div>
            </div>
        </header>

        <div class="metrics-grid">
            <div class="metric-card">
                <div class="metric-header">
                    <div class="metric-title" style="font-size: 1.3rem;">SAN PEDRO</div>
                    <div class="metric-icon">👥</div>
                    
                </div>
                <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
                    <a href="San_pedro.php"><button style="
                        background: var(--primary-color);
                        color: #fff;
                        border: none;
                        border-radius: 8px;
                        padding: 0.75rem 2rem;
                        font-size: 1.1rem;
                        font-weight: 600;
                        cursor: pointer;
                        box-shadow: var(--card-shadow);
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                        transition: background 0.2s;
                    " 
                    onmouseover="this.style.background='#3a0ca3'"
                    onmouseout="this.style.background='var(--primary-color)'">
                        <span style="font-size:1.3rem;">🔍</span> View Details
                    </button></a>
             </div>
                    
            </div>

            <div class="metric-card">
                <div class="metric-header">
                    <div class="metric-title" style="font-size: 1.3rem;">BIÑAN</div>
                    <div class="metric-icon">👥</div>
                    
                </div>
                <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
                    <a href="Biñan.php"><button style="
                        background: var(--primary-color);
                        color: #fff;
                        border: none;
                        border-radius: 8px;
                        padding: 0.75rem 2rem;
                        font-size: 1.1rem;
                        font-weight: 600;
                        cursor: pointer;
                        box-shadow: var(--card-shadow);
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                        transition: background 0.2s;
                    " 
                    onmouseover="this.style.background='#3a0ca3'"
                    onmouseout="this.style.background='var(--primary-color)'">
                        <span style="font-size:1.3rem;">🔍</span> View Details
                    </button></a>
                 </div>
                    
            </div>

            <div class="metric-card">
                <div class="metric-header">
                    <div class="metric-title" style="font-size: 1.3rem;">STA ROSA</div>
                    <div class="metric-icon">👥</div>
                    
                </div>
                <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
                    <a href="Sta_rosa.php"><button style="
                        background: var(--primary-color);
                        color: #fff;
                        border: none;
                        border-radius: 8px;
                        padding: 0.75rem 2rem;
                        font-size: 1.1rem;
                        font-weight: 600;
                        cursor: pointer;
                        box-shadow: var(--card-shadow);
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                        transition: background 0.2s;
                    " 
                    onmouseover="this.style.background='#3a0ca3'"
                    onmouseout="this.style.background='var(--primary-color)'">
                        <span style="font-size:1.3rem;">🔍</span> View Details
                    </button></a>
                </div>
                    
            </div>

            <div class="metric-card">
                <div class="metric-header">
                    <div class="metric-title" style="font-size: 1.3rem;">CABUYAO</div>
                    <div class="metric-icon">👥</div>
                    
                </div>
                <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
                    <a href="Cabuyao.php"><button style="
                        background: var(--primary-color);
                        color: #fff;
                        border: none;
                        border-radius: 8px;
                        padding: 0.75rem 2rem;
                        font-size: 1.1rem;
                        font-weight: 600;
                        cursor: pointer;
                        box-shadow: var(--card-shadow);
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                        transition: background 0.2s;
                    " 
                    onmouseover="this.style.background='#3a0ca3'"
                    onmouseout="this.style.background='var(--primary-color)'">
                        <span style="font-size:1.3rem;">🔍</span> View Details
                    </button></a>
            </div>
            
            
                    
            </div>
            
        </div>
        <div class="metrics-grid">
            <div class="metric-card">
                <div class="metric-header">
                    <div class="metric-title" style="font-size: 1.3rem;">CALAMBA</div>
                    <div class="metric-icon">👥</div>
                    
                </div>
                <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
                    <a href="Calamba.php"><button style="
                        background: var(--primary-color);
                        color: #fff;
                        border: none;
                        border-radius: 8px;
                        padding: 0.75rem 2rem;
                        font-size: 1.1rem;
                        font-weight: 600;
                        cursor: pointer;
                        box-shadow: var(--card-shadow);
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                        transition: background 0.2s;
                    " 
                    onmouseover="this.style.background='#3a0ca3'"
                    onmouseout="this.style.background='var(--primary-color)'">
                        <span style="font-size:1.3rem;">🔍</span> View Details
                    </button></a>
             </div>
                    
            </div>

            <div class="metric-card">
                <div class="metric-header">
                    <div class="metric-title" style="font-size: 1.3rem;">BAY</div>
                    <div class="metric-icon">👥</div>
                    
                </div>
                <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
                   <a href="Bay.php"><button style="
                        background: var(--primary-color);
                        color: #fff;
                        border: none;
                        border-radius: 8px;
                        padding: 0.75rem 2rem;
                        font-size: 1.1rem;
                        font-weight: 600;
                        cursor: pointer;
                        box-shadow: var(--card-shadow);
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                        transition: background 0.2s;
                    " 
                    onmouseover="this.style.background='#3a0ca3'"
                    onmouseout="this.style.background='var(--primary-color)'">
                        <span style="font-size:1.3rem;">🔍</span> View Details
                    </button></a>
                 </div>
                    
            </div>

            <div class="metric-card">
                <div class="metric-header">
                    <div class="metric-title" style="font-size: 1.3rem;">CALAUAN</div>
                    <div class="metric-icon">👥</div>
                    
                </div>
                <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
                   <a href="Calauan.php"><button style="
                        background: var(--primary-color);
                        color: #fff;
                        border: none;
                        border-radius: 8px;
                        padding: 0.75rem 2rem;
                        font-size: 1.1rem;
                        font-weight: 600;
                        cursor: pointer;
                        box-shadow: var(--card-shadow);
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                        transition: background 0.2s;
                    " 
                    onmouseover="this.style.background='#3a0ca3'"
                    onmouseout="this.style.background='var(--primary-color)'">
                        <span style="font-size:1.3rem;">🔍</span> View Details
                    </button></a>
                </div>
                    
            </div>

            <div class="metric-card">
                <div class="metric-header">
                    <div class="metric-title" style="font-size: 1.3rem;">SAN PABLO</div>
                    <div class="metric-icon">👥</div>
                    
                </div>
                <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
                    <a href="San_Pablo.php"><button style="
                        background: var(--primary-color);
                        color: #fff;
                        border: none;
                        border-radius: 8px;
                        padding: 0.75rem 2rem;
                        font-size: 1.1rem;
                        font-weight: 600;
                        cursor: pointer;
                        box-shadow: var(--card-shadow);
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                        transition: background 0.2s;
                    " 
                    onmouseover="this.style.background='#3a0ca3'"
                    onmouseout="this.style.background='var(--primary-color)'">
                        <span style="font-size:1.3rem;">🔍</span> View Details
                    </button></a>
            </div>
            
            
                    
            </div>
            
        </div>
        <div class="metric-card">
    <div class="metric-header">
        <div class="metric-title" style="width:100%; text-align:center; font-size: 1.5rem;">LAGUNA 👥</div>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
       <a href="Laguna.php"><button style="
                        background: var(--primary-color);
                        color: #fff;
                        border: none;
                        border-radius: 8px;
                        padding: 0.75rem 2rem;
                        font-size: 1.1rem;
                        font-weight: 600;
                        cursor: pointer;
                        box-shadow: var(--card-shadow);
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                        transition: background 0.2s;
                    " 
                    onmouseover="this.style.background='#3a0ca3'"
                    onmouseout="this.style.background='var(--primary-color)'">
                        <span style="font-size:1.3rem;">🔍</span> View Details
                    </button></a>
    </div>
</div>

        


</body>
</html>

