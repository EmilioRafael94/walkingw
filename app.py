from flask import Flask, request, jsonify

app = Flask(__name__)

schools = [{"id": 1, "name": "Corpus", "location": "Uptown"}]

def _find_next_id():
    return max(school["id"] for school in schools) + 1

@app.get("/schools")
def get_schools():
    return jsonify(schools)

@app.post("/schools")
def add_school():
    if request.is_json:
        school = request.get_json()
        school["id"] = _find_next_id()
        schools.append(school)
        return school, 201
    return {"error": "request must be json"}, 415

@app.put("/schools/<int:school_id>")
def update_school(school_id):
    if request.is_json:
        data = request.get_json()
        for school in schools:
            if school["id"] == school_id:
                school["name"] = data.get("name", school["name"])
                school["location"] = data.get("location", school["location"])
                return school, 200
        return {"Error": "School not found"}, 404
    return {"Error": "Request must be JSON"}, 415  

if __name__ == '__main__':
    app.run(debug=True)
