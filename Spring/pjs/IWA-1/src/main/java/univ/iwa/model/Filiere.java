package univ.iwa.model;

import java.util.List;

import com.fasterxml.jackson.annotation.JsonIgnore;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@NoArgsConstructor @AllArgsConstructor @Data
@Entity
public class Filiere {
	@Id
	Long id;
	String nomFiliere;
	@OneToMany(mappedBy="filiere")
	@JsonIgnore
	List<Etudiant> etudiants;
}
