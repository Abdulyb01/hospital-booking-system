/**
 * Dashboard JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Check authentication
    const user = checkAuth();
    console.log('User:', user);
    
    // Load dashboard data
    loadDashboardData();
});

/**
 * Load Dashboard Data
 */
async function loadDashboardData() {
    try {
        // Load appointments
        const appointmentsRes = await apiCall('/appointments');
        if (appointmentsRes.success) {
            updateAppointmentsUI(appointmentsRes.data);
        }
        
        // Load statistics
        loadStatistics();
    } catch (error) {
        console.error('Error loading dashboard:', error);
    }
}

/**
 * Update Appointments UI
 */
function updateAppointmentsUI(appointments) {
    const appointmentsList = document.getElementById('appointmentsList');
    
    if (!appointments || appointments.length === 0) {
        appointmentsList.innerHTML = '<p class="text-center text-muted">No appointments scheduled</p>';
        return;
    }
    
    let html = '';
    appointments.forEach(appointment => {
        const statusClass = `appointment-card ${appointment.status}`;
        html += `
            <div class="${statusClass}">
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="mb-1">Dr. ${appointment.doctor_name}</h6>
                        <p class="mb-1"><small>${appointment.department}</small></p>
                        <p class="mb-0"><small class="text-muted">${formatDate(appointment.appointment_date)} at ${appointment.appointment_time}</small></p>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="badge badge-${appointment.status}">${appointment.status}</span>
                    </div>
                </div>
            </div>
        `;
    });
    
    appointmentsList.innerHTML = html;
}

/**
 * Load Statistics
 */
async function loadStatistics() {
    try {
        const stats = await apiCall('/appointments/statistics');
        if (stats.success) {
            document.getElementById('upcomingCount').textContent = stats.data.upcoming || 0;
            document.getElementById('completedCount').textContent = stats.data.completed || 0;
            document.getElementById('followupCount').textContent = stats.data.followups || 0;
            document.getElementById('totalCount').textContent = stats.data.total || 0;
        }
    } catch (error) {
        console.error('Error loading statistics:', error);
    }
}
