const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"profile.edit":{"uri":"profile","methods":["GET","HEAD"]},"profile.update":{"uri":"profile","methods":["PATCH"]},"profile.destroy":{"uri":"profile","methods":["DELETE"]},"Professors.index":{"uri":"Professors","methods":["GET","HEAD"]},"Professors.create":{"uri":"Professors\/create","methods":["GET","HEAD"]},"Professors.store":{"uri":"Professors","methods":["POST"]},"Professors.show":{"uri":"Professors\/{Professor}","methods":["GET","HEAD"],"parameters":["Professor"]},"Professors.edit":{"uri":"Professors\/{Professor}\/edit","methods":["GET","HEAD"],"parameters":["Professor"]},"Professors.update":{"uri":"Professors\/{Professor}","methods":["PUT","PATCH"],"parameters":["Professor"]},"Professors.destroy":{"uri":"Professors\/{Professor}","methods":["DELETE"],"parameters":["Professor"]},"Students.index":{"uri":"Students","methods":["GET","HEAD"]},"Students.create":{"uri":"Students\/create","methods":["GET","HEAD"]},"Students.store":{"uri":"Students","methods":["POST"]},"Students.show":{"uri":"Students\/{Student}","methods":["GET","HEAD"],"parameters":["Student"]},"Students.edit":{"uri":"Students\/{Student}\/edit","methods":["GET","HEAD"],"parameters":["Student"]},"Students.update":{"uri":"Students\/{Student}","methods":["PUT","PATCH"],"parameters":["Student"]},"Students.destroy":{"uri":"Students\/{Student}","methods":["DELETE"],"parameters":["Student"]},"Subjects.index":{"uri":"Subjects","methods":["GET","HEAD"]},"Subjects.create":{"uri":"Subjects\/create","methods":["GET","HEAD"]},"Subjects.store":{"uri":"Subjects","methods":["POST"]},"Subjects.show":{"uri":"Subjects\/{Subject}","methods":["GET","HEAD"],"parameters":["Subject"]},"Subjects.edit":{"uri":"Subjects\/{Subject}\/edit","methods":["GET","HEAD"],"parameters":["Subject"]},"Subjects.update":{"uri":"Subjects\/{Subject}","methods":["PUT","PATCH"],"parameters":["Subject"]},"Subjects.destroy":{"uri":"Subjects\/{Subject}","methods":["DELETE"],"parameters":["Subject"]},"Asignationsubjects.index":{"uri":"Asignationsubjects","methods":["GET","HEAD"]},"Asignationsubjects.create":{"uri":"Asignationsubjects\/create","methods":["GET","HEAD"]},"Asignationsubjects.store":{"uri":"Asignationsubjects","methods":["POST"]},"Asignationsubjects.show":{"uri":"Asignationsubjects\/{Asignationsubject}","methods":["GET","HEAD"],"parameters":["Asignationsubject"]},"Asignationsubjects.edit":{"uri":"Asignationsubjects\/{Asignationsubject}\/edit","methods":["GET","HEAD"],"parameters":["Asignationsubject"]},"Asignationsubjects.update":{"uri":"Asignationsubjects\/{Asignationsubject}","methods":["PUT","PATCH"],"parameters":["Asignationsubject"]},"Asignationsubjects.destroy":{"uri":"Asignationsubjects\/{Asignationsubject}","methods":["DELETE"],"parameters":["Asignationsubject"]},"graphic":{"uri":"graphic","methods":["GET","HEAD"]},"reports":{"uri":"reports","methods":["GET","HEAD"]},"register":{"uri":"register","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"],"parameters":["token"]},"password.store":{"uri":"reset-password","methods":["POST"]},"verification.notice":{"uri":"verify-email","methods":["GET","HEAD"]},"verification.verify":{"uri":"verify-email\/{id}\/{hash}","methods":["GET","HEAD"],"parameters":["id","hash"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"password.confirm":{"uri":"confirm-password","methods":["GET","HEAD"]},"password.update":{"uri":"password","methods":["PUT"]},"logout":{"uri":"logout","methods":["POST"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
