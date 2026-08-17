# WhenKAYA Project Guidelines & Behavioral Constraints

## Authentication & Identity Architecture
- **Custom Authentication**: Do not use Laravel starter kits (Breeze, Jetstream, Fortify). Auth is custom-built using session-based authentication in Laravel.
- **Core Identity Tables**: `users`, `password_reset_tokens`, and `sessions`.
- **Primary Keys**: Use PostgreSQL UUIDs for `users` and all core domain entities.

## 4-Layer Module Development Pattern
When planning, building, or documenting feature modules, strictly organize specifications into the following 4 layers:  
1. **Data Dictionary**: Field names, data types, nullability, validation rules, input/output dependencies.
2. **Schema & Models**: Migration SQL/Eloquent definitions, relationships, fillables, and type casting.
3. **Backend & API**: Controllers, Form Requests, Services, Middleware, and Inertia response payloads.
4. **Frontend**: Inertia React page components, state management, accessibility, and Persona 4 Golden UI styling.

## Dual-Developer Parallel Execution Pattern
- Divide work into **Developer A (Infra/Auth/Shell)** and **Developer B (Core Financial Domain)** tracks.
- Unblock domain development (Developer B) during initial sprints using mock/stubbed `user_id` seeding until the auth integration milestone.
