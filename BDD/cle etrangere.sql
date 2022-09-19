alter table Attribution
  add constraint fk1_Attribution
   foreign key(idEtab) references Etablissement(id),
  add constraint fk2_Attribution
   foreign key(idGroupe) references Groupe(id);
